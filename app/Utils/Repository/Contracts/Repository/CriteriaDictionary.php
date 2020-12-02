<?php

namespace App\Utils\Repository\Contracts\Repository;

interface CriteriaDictionary
{
    public const SELECT = 'select';
    public const WITH = 'with';
    public const WITH_COUNT = 'with-count';
    public const COUNT_COMPARE_WITH_ZERO = 'count-compare-with-zero';
    public const LIMIT = 'limit';
    public const OFFSET = 'offset';
    public const ALL = 'all';
    public const ID = 'id';
    public const ORDER_BY_DESC = 'order-by-desc';
    public const ORDER_BY = 'order-by';
    public const GROUP_BY = 'group-by';
    public const UNIQUE = 'unique';
    public const SELECT_MAX = 'select-max';
    public const BY_UUID = 'uuid';
    public const IS_NULL = 'is_null';
}
