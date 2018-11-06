<?php

namespace Shoppy\Product\Command\Value;

use Shoppy\Product\Command\Entity\AbstractProduct;
use Shoppy\Product\Command\Factory\ProductFactoryInterface;

/**
 * Class ShopManager
 * @package Shoppy\Product\Command
 */
abstract class AbstractShopManager
{
    /**
     * @var int
     */
    private $managerId;

    /**
     * ShopManager constructor.
     *
     * @param int $managerId
     */
    public function __construct(int $managerId)
    {
        $this->managerId = $managerId;
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->managerId;
    }

    /**
     * @param NewProduct $product
     *
     * @return AbstractProduct
     * @throws \Exception
     */
    public function createProduct(NewProduct $product): AbstractProduct
    {
        $product = $this->getProductFactory()->createFromNewProduct($product);
        $product->assignManager($this);

        return $product;
    }

    /**
     * @param AbstractProduct $product
     *
     * @return ProductDeleted
     */
    public function deleteProduct(AbstractProduct $product): ProductDeleted
    {
        return new ProductDeleted($this->id(), $product->id());
    }

    /**
     * @return ProductFactoryInterface
     */
    abstract protected function getProductFactory(): ProductFactoryInterface;
}
