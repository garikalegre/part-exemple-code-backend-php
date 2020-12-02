<?php

namespace App\Controllers;

use App\UseCases\Requests\ExampleRequest;
use App\Utils\Serializer\Contracts\Serializer;
use App\UseCases\Contracts\ExampleUseCase;
use App\Presenters\Contracts\ExamplePresenter;

final class ExampleController
{
    private Serializer $serializer;
    private ExampleUseCase $case;
    private ExamplePresenter $presenter;

    public function __constructor(Serializer $serializer, ExampleUseCase $case, ExamplePresenter $presenter)
    {
        $this->serializer = $serializer;
        $this->case = $case;
        $this->presenter = $presenter;
    }

    public function __invoke(Request $apiRequest)
    {
        /** @var ExampleRequest $request */
        $request = $this->serializer->fromArray(ExampleRequest::class, $apiRequest->validated());
        $response = $this->case->execute($request);
     
        return $this->presenter->present($response);
    }
}
