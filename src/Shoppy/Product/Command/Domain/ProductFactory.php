<?php

namespace Shoppy\Product\Command\Domain;

/**
 * Interface ProductFactory
 * @package Shoppy\Product\Command\Domain
 */
interface ProductFactory
{
    /**
     * @return Product
     */
    public function buildNew(): Product;
}
