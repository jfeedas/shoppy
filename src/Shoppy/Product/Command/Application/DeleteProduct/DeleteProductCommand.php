<?php

namespace Shoppy\Product\Command\Application\DeleteProduct;

use Shoppy\Product\Command\Domain\ProductId;

/**
 * Class DeleteProductCommand
 * @package Shoppy\Product\Command\Application\DeleteProduct
 */
interface DeleteProductCommand
{
    /**
     * @return ProductId
     */
    public function productId(): ProductId;
}
