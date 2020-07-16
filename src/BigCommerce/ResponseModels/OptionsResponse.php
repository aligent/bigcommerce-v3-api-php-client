<?php


namespace BigCommerce\ApiV3\ResponseModels;


use BigCommerce\ApiV3\ResourceModels\Catalog\Product\ProductOption;

class OptionsResponse extends PaginatedResponse
{
    /**
     * @var Option[]
     */
    private array $options;

    /**
     * @return Option[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    protected function addData(array $data): void
    {
        $this->options = array_map(function(\stdClass $o) { return new ProductOption($o); }, $data);
    }
}
