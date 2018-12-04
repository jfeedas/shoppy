<?php

namespace Shoppy\Product\Command\Application\CreateProduct;

use Shoppy\Product\Command\Domain\ProductDescription;
use Shoppy\Product\Command\Domain\ProductImage;
use Shoppy\Product\Command\Domain\ProductPrice;
use Shoppy\Product\Command\Domain\ProductTitle;

/**
 * Interface CreateProductCommand
 * @package Shoppy\Product\Command\Application\CreateProduct
 */
interface CreateProductCommand
{
    /**
     * @return ProductTitle
     */
    public function title(): ProductTitle;

    /**
     * @return ProductDescription|null
     */
    public function description(): ?ProductDescription;

    /**
     * @return ProductPrice|null
     */
    public function price(): ?ProductPrice;

    /**
     * @return ProductImage|null
     */
    public function mainImage(): ?ProductImage;
}
