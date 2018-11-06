<?php

namespace Shoppy\Product\Command\Value;

use Shoppy\Product\Command\Entity\ProductInterface;
use Shoppy\Product\Command\Factory\ProductFactoryInterface;

/**
 * Class ShopManager
 * @package Shoppy\Product\Command
 */
abstract class AbstractShopManager
{
    /**
     * @var string
     */
    private $managerId;

    /**
     * ShopManager constructor.
     *
     * @param string $managerId
     */
    public function __construct(string $managerId)
    {
        $this->managerId = $managerId;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->managerId;
    }

    /**
     * @param NewProduct $product
     *
     * @return ProductInterface
     */
    public function createProduct(NewProduct $product): ProductInterface
    {
        $product = $this->getProductFactory()->createFromNewProduct($product);
        $product->assignManager($this);

        return $product;
    }

    /**
     * @param ProductInterface $product
     *
     * @return ProductDeleted
     */
    public function deleteProduct(ProductInterface $product): ProductDeleted
    {
        return new ProductDeleted($this->id(), $product->id());
    }

    /**
     * @return ProductFactoryInterface
     */
    abstract protected function getProductFactory(): ProductFactoryInterface;
}
