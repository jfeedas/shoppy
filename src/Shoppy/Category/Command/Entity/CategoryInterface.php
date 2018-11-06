<?php

namespace Shoppy\Category\Command\Entity;

use Shoppy\Category\Command\Value\NewCategory;

/**
 * Class CategoryInterface
 * @package Shoppy\Category\Command\Entity
 */
interface CategoryInterface
{
    /**
     * @return null|int
     */
    public function id(): ?int;

    /**
     * @param NewCategory $newCategory
     *
     * @return CategoryInterface
     */
    public function appendChild(NewCategory $newCategory): CategoryInterface;
}
