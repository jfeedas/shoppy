<?php

namespace Shoppy\Product\Command\Factory;

use Shoppy\Product\Command\Entity\AbstractProduct;
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
     * @return AbstractProduct
     */
    public function buildFromArray(array $data): AbstractProduct;

    /**
     * @param NewProduct $newProduct
     *
     * @return AbstractProduct
     */
    public function createFromNewProduct(NewProduct $newProduct): AbstractProduct;
}
