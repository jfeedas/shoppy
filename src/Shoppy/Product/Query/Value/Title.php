<?php

namespace Shoppy\Product\Query\Value;

/**
 * Class Title
 * @package Shoppy\Product\Query\Value
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
