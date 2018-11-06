<?php

namespace Shoppy\Product\Command\Value;

/**
 * Class Category
 * @package Shoppy\Product\Command
 */
class Category
{
    /**
     * @var int
     */
    private $categoryId;

    /**
     * Category constructor.
     *
     * @param int $categoryId
     */
    public function __construct(int $categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->categoryId;
    }
}
