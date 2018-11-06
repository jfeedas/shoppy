<?php

namespace Shoppy\Product\Query\Fetcher;

/**
 * Interface GetProductsInCategoryFetcherInterface
 * @package Shoppy\Product\Query\Fetcher
 */
interface GetProductsInCategoryFetcherInterface
{
    /**
     * @param int $categoryId
     *
     * @return array
     */
    public function get(int $categoryId): array;
}
