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
     * @param ProductDescription $description
     * @param ProductPrice $price
     *
     * @return Product
     */
    public function buildNew(ProductTitle $title, ProductDescription $description, ProductPrice $price): Product;
}
