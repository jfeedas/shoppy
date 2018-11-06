<?php

namespace Shoppy\Product\Command\Entity;

use Shoppy\Product\Command\Value\AbstractShopManager;
use Shoppy\Product\Command\Value\Attribute;
use Shoppy\Product\Command\Value\Category;

/**
 * Interface ProductInterface
 * @package Shoppy\Product\Command
 */
interface ProductInterface
{
    /**
     * @param AbstractShopManager $shopManager
     *
     * @return bool
     */
    public function assignManager(AbstractShopManager $shopManager): bool;

    /**
     * @param Attribute $attribute
     *
     * @return bool
     */
    public function addAttribute(Attribute $attribute): bool;

    /**
     * @param Category $category
     *
     * @return bool
     */
    public function assignToCategory(Category $category): bool;
}
