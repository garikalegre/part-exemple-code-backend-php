<?php

namespace App\Presenters\Api;

use App\Presenters\Contracts\ExamplePresenter;
use App\UseCases\Responses\ExampleResponse;

class ExampleApiPresenter implements ExamplePresenter
{
    public function present(ExampleResponse $response)
    {
        return$response->getExampleResultProperty();
    }
}
