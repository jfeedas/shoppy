<?php

namespace Shoppy\Category\Query\Repository;

use Shoppy\Category\Query\Value\CategoryInterface;

/**
 * Class CategoryRepositoryInterface
 * @package Shoppy\Category\Query\Repository
 */
interface CategoryRepositoryInterface
{
    /**
     * @param array $ids
     *
     * @return array|CategoryInterface[]
     */
    public function getByIds(array $ids): array;
}
