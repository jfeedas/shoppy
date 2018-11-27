<?php

namespace Shoppy\Product\Command\Domain;

/**
 * Class ProductPrice
 * @package Shoppy\Product\Command\Domain
 */
class ProductPrice
{
    /**
     * @var int
     */
    private $price;

    /**
     * ProductTitle constructor.
     *
     * @param int $price
     */
    public function __construct(int $price)
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->price;
    }
}
