<?php


namespace BigCommerce\ApiV3\ResponseModels;


use BigCommerce\ApiV3\ResourceModels\Catalog\Category\CategoryMetafield;

class CategoryMetafieldsResponse extends PaginatedResponse
{
    /**
     * @var CategoryMetafield[]
     */
    private array $metafields;

    /**
     * @return CategoryMetafield[]
     */
    public function getMetafields(): array
    {
        return $this->metafields;
    }

    protected function addData(array $data): void
    {
        $this->setData(array_map(function(\stdClass $m) { return new CategoryMetafield($m); }, $data));
    }

    protected function setData(array $data): void
    {
        $this->metafields = $data;
    }
}
