<?php

namespace Shoppy\Product\Command\Entity;

use Shoppy\Product\Command\Value\Attribute;

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
     * @param CategoryInterface $category
     *
     * @return bool
     */
    public function assignToCategory(CategoryInterface $category): bool;

    /**
     * @return string
     */
    public function id(): string;
}
