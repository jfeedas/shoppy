<?php

namespace Shoppy\Product\Command\Domain;

/**
 * Interface ProductRepository
 * @package Shoppy\Product\Command\Domain
 */
interface ProductRepository
{
    /**
     * @param Product $product
     *
     * @return mixed
     */
    public function save(Product $product): void;

    /**
     * @param Product $product
     */
    public function delete(Product $product): void;

    /**
     * @param ProductId $productId
     *
     * @return null|Product
     */
    public function getById(ProductId $productId): ?Product;
}
