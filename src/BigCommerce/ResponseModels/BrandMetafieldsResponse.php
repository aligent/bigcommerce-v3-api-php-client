<?php


namespace BigCommerce\ApiV3\ResponseModels;


use BigCommerce\ApiV3\ResourceModels\Catalog\Brand\BrandMetafield;

class BrandMetafieldsResponse extends PaginatedResponse
{
    /**
     * @var BrandMetafield[]
     */
    private array $metafields;

    /**
     * @return BrandMetafield[]
     */
    public function getMetafields(): array
    {
        return $this->metafields;
    }

    protected function addData(array $data): void
    {
        $this->setData(array_map(function(\stdClass $m) { return new BrandMetafield($m); }, $data));
    }

    protected function setData(array $data): void
    {
        $this->metafields = $data;
    }
}
