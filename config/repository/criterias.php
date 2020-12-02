<?php

/*______________________________________________________________________________________________________________________
 *
 * Criteria list divided by the contexts
 *
 * 'context' => [
 *     'criteria alias' => 'Criteria class'
 * ]
 *----------------------------------------------------------------------------------------------------------------------
 */

return [
    /*------------------------------------------------------------------------------------------------------------------
     *                                              Common
     *__________________________________________________________________________________________________________________
     */
    \App\Utils\Repository\CriteriaFactory::DEFAULT_CONTEXT => [
        \App\Utils\Repository\Contracts\Repository\CriteriaDictionary::WITH =>
            \App\Utils\Repository\Criteria\Common\With::class,
        \App\Utils\Repository\Contracts\Repository\CriteriaDictionary::ALL =>
            \App\Utils\Repository\Criteria\Common\All::class,
        \App\Utils\Repository\Contracts\Repository\CriteriaDictionary::ID =>
            \App\Utils\Repository\Criteria\Common\Id::class,
        \App\Utils\Repository\Contracts\Repository\CriteriaDictionary::ORDER_BY_DESC =>
            \App\Utils\Repository\Criteria\Common\OrderByDesc::class,
        \App\Utils\Repository\Contracts\Repository\CriteriaDictionary::ORDER_BY =>
            \App\Utils\Repository\Criteria\Common\OrderBy::class,
        \App\Utils\Repository\Contracts\Repository\CriteriaDictionary::GROUP_BY =>
            \App\Utils\Repository\Criteria\Common\GroupBy::class,
        \App\Utils\Repository\Contracts\Repository\CriteriaDictionary::LIMIT =>
            \App\Utils\Repository\Criteria\Common\Limit::class,
        \App\Utils\Repository\Contracts\Repository\CriteriaDictionary::OFFSET =>
            \App\Utils\Repository\Criteria\Common\Offset::class,
        \App\Utils\Repository\Contracts\Repository\CriteriaDictionary::WITH_COUNT =>
            \App\Utils\Repository\Criteria\Common\WithCount::class,
        \App\Utils\Repository\Contracts\Repository\CriteriaDictionary::COUNT_COMPARE_WITH_ZERO =>
            \App\Utils\Repository\Criteria\Common\CountCompareWithZero::class,
        \App\Utils\Repository\Contracts\Repository\CriteriaDictionary::SELECT =>
            \App\Utils\Repository\Criteria\Common\Select::class,
        \App\Utils\Repository\Contracts\Repository\CriteriaDictionary::UNIQUE =>
            \App\Utils\Repository\Criteria\Common\Unique::class,
        \App\Utils\Repository\Contracts\Repository\CriteriaDictionary::SELECT_MAX =>
            \App\Utils\Repository\Criteria\Common\SelectMax::class,
        \App\Utils\Repository\Contracts\Repository\CriteriaDictionary::BY_UUID =>
            \App\Utils\Repository\Criteria\Common\ByUuid::class,
        \App\Utils\Repository\Contracts\Repository\CriteriaDictionary::IS_NULL =>
        \App\Utils\Repository\Criteria\Common\IsNull::class
    ],

];
