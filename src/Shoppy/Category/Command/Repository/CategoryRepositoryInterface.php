<?php

namespace Shoppy\Category\Command\Repository;

use Shoppy\Category\Command\Entity\CategoryInterface;

/**
 * Interface CategoryRepositoryInterface
 * @package Shoppy\Category\Command\Repository
 */
interface CategoryRepositoryInterface
{
    /**
     * @param CategoryInterface $category
     *
     * @return bool
     */
    public function persist(CategoryInterface $category): bool;

    /**
     * @param int $id
     *
     * @return null|CategoryInterface
     */
    public function getById(int $id): ?CategoryInterface;
}
