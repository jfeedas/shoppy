<?php

namespace Shoppy\Category\Query\Fetcher;

/**
 * Interface CategoryChildrenFetcherInterface
 * @package Shoppy\Category\Query\Fetcher
 */
interface CategoryChildrenFetcherInterface
{
    /**
     * @param int $categoryId
     *
     * @return array
     */
    public function get(int $categoryId): array;
}
