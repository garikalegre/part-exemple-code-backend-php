<?php

namespace App\Utils\Repository\Contracts\Repository;

interface PaginableQuery extends Query
{
    public function getPerPage(): ?int;

    public function setPerPage(int $perPage);
}
