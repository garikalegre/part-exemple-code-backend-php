<?php 

namespace App\UseCases;

use App\Servoces\Contracts\ExampleServiceInterface;
use App\UseCases\Contracts\ExampleUseCase;
use App\UseCases\Requests\ExampleRequest;
use App\UseCases\Responses\ExampleResponse;

class ExampleCase implements ExampleUseCase
{
    private ExampleServiceInterface $service;

    public function __construct(ExampleServiceInterface $service)
    {
        $this->service = $service;
    }

    public function execute(ExampleRequest $request): ExampleResponse
    {
        $result = $this->service->businessLogicCase($request);
        $response = new ExampleResponse();
        $response->setExampleResultProperty($result);
        return $response;
    }
}
