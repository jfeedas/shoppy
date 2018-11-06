<?php

namespace Shoppy\Category\Query\Value;

/**
 * Class CategoryInterface
 * @package Shoppy\Category\Query\Value
 */
interface CategoryInterface
{
    /**
     * @return int
     */
    public function id(): int;

    /**
     * @return Title
     */
    public function title(): Title;
}
