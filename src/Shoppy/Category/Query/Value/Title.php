<?php

namespace Shoppy\Category\Query\Value;

/**
 * Class Title
 * @package Shoppy\Category\Query\Value
 */
class Title
{
    /**
     * @var string
     */
    private $title;

    /**
     * Title constructor.
     *
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->title;
    }
}