<?php

namespace Shoppy\Product\Query\Value;

/**
 * Interface ProductInterface
 * @package Shoppy\Product\Query\Value
 */
interface ProductInterface
{
    /**
     * @return string
     */
    public function id(): string;

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
