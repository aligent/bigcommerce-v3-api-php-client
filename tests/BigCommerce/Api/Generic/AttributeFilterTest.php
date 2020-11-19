<?php

namespace BigCommerce\Tests\Api\Generic;

use BigCommerce\ApiV3\Api\Generic\AttributeFilter;
use PHPUnit\Framework\TestCase;

class AttributeFilterTest extends TestCase
{
    public function testCanBuildInFilter(): void
    {
        $filter = AttributeFilter::in('id', [1,2,3]);
        $this->assertEquals(['id:in' => '1,2,3'], $filter);
    }

    public function testCanBuildGreaterThanOrEqualFilter(): void
    {
        $filter = AttributeFilter::greaterThanOrEqual('price', 100);
        $this->assertEquals(['price:min' => 100], $filter);
    }

    public function testCanBuildLessThanOrEqualFilter(): void
    {
        $filter = AttributeFilter::lessThanOrEqual('price', 100);
        $this->assertEquals(['price:max' => 100], $filter);
    }

    public function testCanBuildLessThanFilter(): void
    {
        $filter = AttributeFilter::lessThan('price', 100);
        $this->assertEquals(['price:less' => 100], $filter);
    }

    public function testCanBuildGreaterThanFilter(): void
    {
        $filter = AttributeFilter::greaterThan('price', 100);
        $this->assertEquals(['price:greater' => 100], $filter);
    }

    public function testCanBuildLikeFilter(): void
    {
        $filter = AttributeFilter::like('sku', 'abc');
        $this->assertEquals(['sku:like' => 'abc'], $filter);
    }

    public function testCannotBuildInvalidFilter(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        AttributeFilter::createFilter('something', '', 'somewhere');
    }
}
