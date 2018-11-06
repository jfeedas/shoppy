<?php

namespace Shoppy\Product\Command\Repository;

use Shoppy\Product\Command\Entity\ProductInterface;

/**
 * Interface ProductRepositoryInterface
 * @package Shoppy\Product\Command\Repository
 */
interface ProductRepositoryInterface
{
    /**
     * @param ProductInterface $product
     *
     * @return bool
     */
    public function persist(ProductInterface $product): bool;

    /**
     * @param string $id
     *
     * @return ProductInterface
     */
    public function getById(string $id): ?ProductInterface;

    /**
     * @param ProductInterface $product
     *
     * @return bool
     */
    public function delete(ProductInterface $product): bool;
}
