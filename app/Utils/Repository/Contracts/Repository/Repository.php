<?php

namespace App\Utils\Repository\Contracts\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Interface Repository
 * @package App\Domain\Common\Contracts\Repository
 */
interface Repository
{
    /**
     * @param Query $query
     * @return Collection
     */
    public function findBy(Query $query): Collection;

    /**
     * @param Query $query
     * @return Model|null
     */
    public function findBySingle(Query $query): ?Model;

    /**
     * @param Query $query
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function findPaginated(Query $query, int $perPage = 25): LengthAwarePaginator;

    /**
     * @param Query $query
     * @param int $perPage
     * @return Paginator
     */
    public function findSimplePaginated(Query $query, int $perPage = 25): Paginator;

    /**
     * @param array $params
     * @return Model
     */
    public function create(array $params): Model;

    /**
     * @param Model $model
     * @param array $params
     * @param array $options
     * @return Model
     */
    public function update(Model $model, array $params, array $options = []): Model;

    /**
     * @param Model $model
     * @return mixed
     */
    public function push(Model $model);

    /**
     * @param Model $model
     * @return bool
     */
    public function delete(Model $model): ?bool;

    /**
     * @param Collection $models
     * @return mixed
     */
    public function deleteSeveral(Collection $models);

    /**
     * @param Query $query
     * @return mixed
     */
    public function deleteBy(Query $query);

    /**
     * @param Model $model
     * @param array $related
     * @return mixed
     */
    public function save(Model $model, array $related = []);

    /**
     * @param Query $query
     * @param callable $algorithm
     * @param int $limit
     * @return mixed
     */
    public function chunk(Query $query, callable $algorithm, int $limit = 100);
}
