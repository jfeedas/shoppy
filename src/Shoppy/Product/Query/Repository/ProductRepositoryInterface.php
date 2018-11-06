<?php

namespace Shoppy\Product\Query\Repository;

use Shoppy\Product\Query\Value\ProductInterface;

/**
 * Interface ProductRepositoryInterface
 * @package Shoppy\Product\Query\Repository
 */
interface ProductRepositoryInterface
{
    /**
     * @param array $ids
     *
     * @return array|ProductInterface[]
     */
    public function getByIds(array $ids): array;
}
