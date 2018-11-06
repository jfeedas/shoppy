<?php

namespace Shoppy\Product\Command\Factory;

use Shoppy\Product\Command\Entity\ProductInterface;
use Shoppy\Product\Command\Value\NewProduct;

/**
 * Interface ProductFactoryInterface
 * @package Shoppy\Product\Command\Factory
 */
interface ProductFactoryInterface
{
    /**
     * @param array $data
     *
     * @return ProductInterface
     */
    public function buildFromArray(array $data): ProductInterface;

    /**
     * @param NewProduct $newProduct
     *
     * @return ProductInterface
     */
    public function createFromNewProduct(NewProduct $newProduct): ProductInterface;
}
