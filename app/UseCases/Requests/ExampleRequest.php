<?php

namespace App\UseCases\Requests;

class ExampleRequest
{
    private string $exampleProperty;

    public function setExampleProperty(string $exampleProperty): void
    {
        $this->exampleProperty = $exampleProperty;
    }

    public function getExampleProperty(): string
    {
        return $this->exampleProperty;
    }
}
