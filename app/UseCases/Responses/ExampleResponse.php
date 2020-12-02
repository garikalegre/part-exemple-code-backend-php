<?php 

namespace App\UseCases\Responses;

class ExampleResponse
{
    private string $exampleResultProperty;

    public function setExampleResultProperty(string $exampleResultProperty): void
    {
        $this->exampleResultProperty = $exampleResultProperty;
    }

    public function getExampleResultProperty(): string
    {
        return $this->exampleResultProperty;
    }
}
