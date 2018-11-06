<?php

namespace Shoppy\Product\Query\Value;

/**
 * Interface ProductInterface
 * @package Shoppy\Product\Query\Value
 */
interface ProductInterface
{
    /**
     * @return int
     */
    public function id(): int;

    /**
     * @return Title
     */
    public function title(): Title;

    /**
     * @return Description
     */
    public function description(): Description;

    /**
     * @return Price
     */
    public function price(): Price;
}
