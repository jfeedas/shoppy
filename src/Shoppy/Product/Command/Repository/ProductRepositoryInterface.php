<?php

namespace Shoppy\Product\Command\Repository;

use Shoppy\Product\Command\Entity\AbstractProduct;

/**
 * Interface ProductRepositoryInterface
 * @package Shoppy\Product\Command\Repository
 */
interface ProductRepositoryInterface
{
    /**
     * @param AbstractProduct $product
     *
     * @return bool
     */
    public function persist(AbstractProduct $product): bool;

    /**
     * @param int $id
     *
     * @return AbstractProduct
     */
    public function getById(int $id): ?AbstractProduct;

    /**
     * @param AbstractProduct $product
     *
     * @return bool
     */
    public function delete(AbstractProduct $product): bool;
}
