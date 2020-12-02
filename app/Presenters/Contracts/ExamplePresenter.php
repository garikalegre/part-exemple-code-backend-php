<?php

namespace App\Presenters\Contracts;

use App\UseCases\Responses\ExampleResponse;

interface ExamplePresenter
{
    public function present(ExampleResponse $response);
}
