<?php

namespace Shoppy\Product\Command\Application\CreateProduct;

/**
 * Interface CreateProductCommand
 * @package Shoppy\Product\Command\Application\CreateProduct
 */
interface CreateProductCommand
{
    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @return int
     */
    public function getPrice(): int;
}
