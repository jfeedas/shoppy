<?php

namespace Shoppy\Product\Command\Entity;

use Shoppy\Product\Command\Factory\ProductFactoryInterface;
use Shoppy\Product\Command\Value\NewProduct;

/**
 * Class AbstractShopManager
 * @package Shoppy\Product\Command\Entity
 */
abstract class AbstractShopManager
{
    /**
     * @return string
     */
    abstract public function id(): string;

    /**
     * @param NewProduct $product
     *
     * @return ProductInterface
     */
    public function createProduct(NewProduct $product): ProductInterface
    {
        $product = $this->getProductFactory()->createFromNewProduct($product);
        $product->assignManager($this);
        $this->onProductCreate($product);

        return $product;
    }

    /**
     * @param ProductInterface $product
     */
    public function deleteProduct(ProductInterface $product): void
    {
        $this->onProductCreate($product);
    }

    /**
     * @param ProductInterface $product
     */
    abstract protected function onProductCreate(ProductInterface $product): void;

    /**
     * @param ProductInterface $product
     */
    abstract public function onDeleteProduct(ProductInterface $product): void;

    /**
     * @return ProductFactoryInterface
     */
    abstract protected function getProductFactory(): ProductFactoryInterface;
}
