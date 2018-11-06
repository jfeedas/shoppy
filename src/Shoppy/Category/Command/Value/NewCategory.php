<?php

namespace Shoppy\Category\Command\Value;

/**
 * Class NewCategory
 * @package Shoppy\Category\Command\Value
 */
class NewCategory
{
    /**
     * @var string
     */
    private $title;

    /**
     * NewCategory constructor.
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
    public function title(): string
    {
        return $this->title;
    }
}
