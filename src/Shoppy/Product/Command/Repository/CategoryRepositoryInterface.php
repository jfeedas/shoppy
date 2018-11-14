<?php

namespace Shoppy\Product\Command\Repository;

use Shoppy\Product\Command\Entity\CategoryInterface;

/**
 * Interface CategoryRepositoryInterface
 * @package Shoppy\Product\Command\Repository
 */
interface CategoryRepositoryInterface
{
    /**
     * @param string $categoryId
     *
     * @return CategoryInterface
     */
    public function getById(string $categoryId): CategoryInterface;
}
