<?php

namespace Shoppy\Product\Query\Fetcher;

/**
 * Interface GetProductsInCategoryFetcherInterface
 * @package Shoppy\Product\Query\Fetcher
 */
interface GetProductsInCategoryFetcherInterface
{
    /**
     * @param string $categoryId
     *
     * @return array
     */
    public function get(string $categoryId): array;
}
