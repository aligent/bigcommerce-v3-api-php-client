<?php

namespace BigCommerce\ApiV3\Api\Generic;

class AttributeFilter
{
    public const GREATER_THAN_OR_EQUAL = 'min';
    public const LESS_THAN_OR_EQUAL = 'max';
    public const GREATER_THAN = 'greater';
    public const LESS_THAN = 'less';
    public const LIKE = 'like';
    public const IN = 'in';
    public const NOT_IN = 'not_in';

    private static $validFilters = [
        self::GREATER_THAN_OR_EQUAL,
        self::LESS_THAN_OR_EQUAL,
        self::GREATER_THAN,
        self::LESS_THAN,
        self::LIKE,
        self::IN,
        self::NOT_IN,
    ];

    public static function in(string $attribute, array $values): array
    {
        return self::createFilterForMultiple($attribute, $values, self::IN);
    }

    public static function greaterThanOrEqual(string $attribute, float $value): array
    {
        return self::createFilter($attribute, $value, self::GREATER_THAN_OR_EQUAL);
    }

    public static function lessThanOrEqual(string $attribute, float $value): array
    {
        return self::createFilter($attribute, $value, self::LESS_THAN_OR_EQUAL);
    }

    public static function greaterThan(string $attribute, float $value): array
    {
        return self::createFilter($attribute, $value, self::GREATER_THAN);
    }

    public static function lessThan(string $attribute, float $value): array
    {
        return self::createFilter($attribute, $value, self::LESS_THAN);
    }

    public static function like(string $attribute, string $value): array
    {
        return self::createFilter($attribute, $value, self::LIKE);
    }

    public static function createFilter(string $attribute, string $value, string $filterType): array
    {
        if (!self::isValidFilter($filterType)) {
            throw new \InvalidArgumentException("");
        }

        return ["$attribute:$filterType" => $value];
    }

    public static function createFilterForMultiple(string $attribute, array $values, string $filterType): array
    {
        return self::createFilter($attribute, implode(',', $values), $filterType);
    }

    private static function isValidFilter(string $filterType): bool
    {
        return in_array($filterType, self::$validFilters);
    }
}
