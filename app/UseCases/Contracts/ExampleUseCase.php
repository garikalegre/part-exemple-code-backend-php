<?php

namespace App\UseCases\Contracts;

use App\UseCases\Requests\ExampleRequest;
use App\UseCases\Responses\ExampleResponse;

interface ExampleUseCase
{
    public function execute(ExampleRequest $request): ExampleResponse;
}
