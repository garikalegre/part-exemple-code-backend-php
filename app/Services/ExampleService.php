<?php

namespace App\Services;

use App\Servoces\Contracts\ExampleServiceInterface;
use App\Utils\Repository\Queries\Common\GetAll;

class ExampleService implements ExampleServiceInterface
{
    private ExampleRepository $exampleRepository;

    public function __constructor(ExampleRepository $exampleRepository)
    {
        $this->exampleRepository = $exampleRepository;
    }

    public function businessLogicCase(string $value): string
    {
        $collection = $this->exampleRepository->findBy(new GetAll());
        //some business logic
        return $collection->first()->getKey();
    }
}
