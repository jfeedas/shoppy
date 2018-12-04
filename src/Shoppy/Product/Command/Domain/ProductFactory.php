<?php

namespace Shoppy\Product\Command\Domain;

/**
 * Interface ProductFactory
 * @package Shoppy\Product\Command\Domain
 */
interface ProductFactory
{
    /**
     * @param ProductTitle $title
     * @param ProductDescription|null $description
     * @param ProductPrice|null $price
     * @param ProductImage|null $mainImage
     *
     * @return Product
     */
    public function buildNew(
        ProductTitle $title,
        ?ProductDescription $description,
        ?ProductPrice $price,
        ?ProductImage $mainImage
    ): Product;
}
