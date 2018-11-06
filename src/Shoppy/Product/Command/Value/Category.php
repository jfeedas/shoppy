<?php

namespace Shoppy\Product\Command\Value;

/**
 * Class Category
 * @package Shoppy\Product\Command
 */
class Category
{
    /**
     * @var string
     */
    private $categoryId;

    /**
     * Category constructor.
     *
     * @param string $categoryId
     */
    public function __construct(string $categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->categoryId;
    }
}
