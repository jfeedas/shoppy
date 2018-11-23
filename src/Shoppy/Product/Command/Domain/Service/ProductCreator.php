<?php

namespace Shoppy\Product\Command\Domain\Service;

use Shoppy\Product\Command\Domain\Product;
use Shoppy\Product\Command\Domain\ProductFactory;

/**
 * Class ProductCreator
 * @package Shoppy\Product\Command\Domain\Service
 */
class ProductCreator
{
    /**
     * @var ProductFactory
     */
    private $productFactory;

    /**
     * ProductCreator constructor.
     *
     * @param ProductFactory $productFactory
     */
    public function __construct(ProductFactory $productFactory)
    {
        $this->productFactory = $productFactory;
    }

    /**
     * @return Product
     */
    public function create(): Product
    {
        $product = $this->productFactory->buildNew();
        return $product;
    }
}
