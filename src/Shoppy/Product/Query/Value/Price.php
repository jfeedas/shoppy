<?php

namespace Shoppy\Product\Query\Value;

/**
 * Class Price
 * @package Shoppy\Product\Query\Value
 */
class Price
{
    /**
     * @var int
     */
    private $priceInCents;

    /**
     * Price constructor.
     *
     * @param int $priceInCents
     */
    public function __construct(int $priceInCents)
    {
        $this->priceInCents = $priceInCents;
    }

    /**
     * @return int
     */
    public function priceInCents(): int
    {
        return $this->priceInCents;
    }
}
