<?php

namespace App\Utils\Repository;

use App\Utils\Repository\Contracts\Repository\PluckableQuery;
use App\Utils\Repository\Contracts\Repository\Query;
use App\Utils\Repository\Contracts\Repository\Repository as Contract;
use App\Utils\Repository\Contracts\Criteria;
use App\Utils\Repository\Contracts\CriteriaFactory;
use App\Utils\Repository\Exceptions\RepositoryException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

/**
 * Class Repository
 * @package App\Utils\Repository
 */
abstract class Repository implements Contract
{
    /**
     * @var CriteriaFactory
     */
    private $criteriaFactory;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @var Criteria[]
     */
    private $criteria = [];

    /**
     * @var array
     */
    protected $cascadeDelete = [];

    /**
     * Repository constructor.
     * @param CriteriaFactory $criteriaFactory
     * @param Model $model
     * @throws RepositoryException
     */
    public function __construct(CriteriaFactory $criteriaFactory, Model $model)
    {
        if (! $this->isSatisfy($model)) {
            throw RepositoryException::invalidModel($model);
        }
        $this->criteriaFactory = $criteriaFactory;
        $this->model = $model;
        $this->refreshBuilder();
    }

    abstract protected function isSatisfy(Model $model): bool;

    /**
     * @param Model $model
     * @param array $related
     * @return Model|mixed
     */
    public function save(Model $model, array $related = [])
    {
        $model->save();

        return $this->createRelated($model, $related);
    }

    /**
     * @param Model $model
     * @param array $related
     * @return Model
     */
    private function createRelated(Model $model, array $related)
    {
        foreach ($related as $relation => $relatedItem) {
            if ($relatedItem && method_exists($model, $relation)) {
                $model->{$relation}()->saveMany(
                    is_array($relatedItem)
                        ? new \Illuminate\Database\Eloquent\Collection($relatedItem)
                        : new \Illuminate\Database\Eloquent\Collection([$relatedItem])
                );
            }
        }

        return $model;
    }

    /**
     * @param Query $query
     * @return Collection
     */
    public function findBy(Query $query): Collection
    {
        $builder = $this->proceedRequest($query);

        return $query instanceof PluckableQuery && $query->chosenColumn()
            ? $builder->pluck($query->chosenColumn())
            : $builder->get();
    }

    /**
     * @param Query $query
     * @return Builder
     */
    private function proceedRequest(Query $query): Builder
    {
        $this->refreshBuilder();
        $this->pushCriteria($query);

        return $this->applyCriteria();
    }

    protected function refreshBuilder()
    {
        $this->criteria = [];
        $this->builder = $this->model->newQuery();
    }

    /**
     * @param Query $query
     */
    private function pushCriteria(Query $query)
    {
        $criteria = $query->getCriteria();
        foreach ($criteria as $alias => $value) {
            $this->criteria[] = $this->criteriaFactory->buildCriteria($alias, $value);
        }
    }

    /**
     * @return Builder
     */
    private function applyCriteria(): Builder
    {
        foreach ($this->criteria as $criteria) {
            $this->builder = $criteria->apply($this->builder);
        }

        return $this->builder;
    }

    /**
     * @param Query $query
     * @return Model|null
     */
    public function findBySingle(Query $query): ?Model
    {
        $models = $this->findBy($query);
        $model = $models->first();
        if (! $model) {
            throw new ModelNotFoundException();
        }

        return $model;
    }

    /**
     * @param Query $query
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function findPaginated(Query $query, int $perPage = 25): LengthAwarePaginator
    {
        $query = $this->proceedRequest($query);

        return $query->paginate($perPage);
    }

    /**
     * @param Query $query
     * @param int $perPage
     * @return Paginator
     */
    public function findSimplePaginated(Query $query, int $perPage = 25): Paginator
    {
        $query = $this->proceedRequest($query);

        return $query->simplePaginate($perPage);
    }

    /**
     * @param array $params
     * @return Model
     */
    public function create(array $params): Model
    {
        /** @var Model $model */
        $model = $this->builder->create($params);

        return $model;
    }

    /**
     * @param Model $model
     * @param array $params
     * @param array $options
     * @return Model
     */
    public function update(Model $model, array $params, array $options = []): Model
    {
        $model->update($params, $options);

        return $model;
    }

    /**
     * @param Model $model
     * @return Model|mixed
     */
    public function push(Model $model)
    {
        $model->push();

        return $model;
    }

    /**
     * @param Model $model
     * @return bool
     * @throws \Exception
     */
    public function delete(Model $model): ?bool
    {
        $this->cascadeDelete($model);

        return $model->delete();
    }

    /**
     * @param Model $model
     * @throws \Exception
     */
    private function cascadeDelete(Model $model)
    {
        foreach ($this->cascadeDelete as $relationAlias) {
            $relation = $model->{$relationAlias};
            if ($relation) {
                $relation instanceof Collection ?
                    $this->deleteSeveral($relation) :
                    $relation->delete();
            }
        }
    }

    /**
     * @param Collection $models
     * @return mixed|void
     * @throws \Exception
     */
    public function deleteSeveral(Collection $models)
    {
        foreach ($models as $model) {
            /**
             * @var Model $model
             */
            $this->delete($model);
        }
    }

    /**
     * @param Query $query
     * @return mixed
     */
    public function deleteBy(Query $query)
    {
        $builder = $this->proceedRequest($query);

        return $builder->delete();
    }

    /**
     * @param Query $query
     * @param callable $algorithm
     * @param int $limit
     * @return ChunkResponse|mixed
     */
    public function chunk(Query $query, callable $algorithm, int $limit = 100)
    {
        $query = $this->proceedRequest($query);
        ChunkResponse::clear();
        $query->chunkById($limit, $algorithm);

        return ChunkResponse::buildResponse();
    }
}
