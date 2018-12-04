<?php

namespace Shoppy\Product\Command\Domain\Service;

use Shoppy\Product\Command\Domain\Product;
use Shoppy\Product\Command\Domain\ProductDescription;
use Shoppy\Product\Command\Domain\ProductFactory;
use Shoppy\Product\Command\Domain\ProductImage;
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
     * @param ProductDescription|null $description
     * @param ProductPrice|null $price
     * @param ProductImage|null $mainImage
     *
     * @return Product
     */
    public function create(
        ProductTitle $title,
        ?ProductDescription $description,
        ?ProductPrice $price,
        ?ProductImage $mainImage
    ): Product {
        $product = $this->productFactory->buildNew($title, $description, $price, $mainImage);
        return $product;
    }
}
