<?php

namespace BigCommerce\ApiV3\ResponseModels\Category;

use BigCommerce\ApiV3\ResourceModels\Catalog\Category\CategoryTreeBranch;
use Psr\Http\Message\ResponseInterface;

class CategoryTreeResponse
{
    /**
     * @var CategoryTreeBranch[]
     */
    private array $categoryTree;

    public function __construct(ResponseInterface $response)
    {
        $body = $response->getBody();
        $rawData = json_decode($body);
        $this->decodeResponseData($rawData);
    }

    private function decodeResponseData($rawData): void
    {
        $this->categoryTree = array_map(function (\stdClass $c) {
            return new CategoryTreeBranch($c);
        }, $rawData->data);
    }

    /**
     * @return CategoryTreeBranch[]
     */
    public function getTree(): array
    {
        return $this->categoryTree;
    }
}
