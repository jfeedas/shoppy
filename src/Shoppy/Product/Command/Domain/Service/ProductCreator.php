<?php

namespace Shoppy\Product\Command\Domain\Service;

use Shoppy\Product\Command\Domain\Product;
use Shoppy\Product\Command\Domain\ProductDescription;
use Shoppy\Product\Command\Domain\ProductFactory;
use Shoppy\Product\Command\Domain\ProductPrice;
use Shoppy\Product\Command\Domain\ProductTitle;

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
     * @param ProductTitle $title
     * @param ProductDescription $description
     * @param ProductPrice $price
     *
     * @return Product
     */
    public function create(ProductTitle $title, ProductDescription $description, ProductPrice $price): Product
    {
        $product = $this->productFactory->buildNew($title, $description, $price);
        return $product;
    }
}
