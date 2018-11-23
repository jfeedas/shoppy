<?php

namespace Shoppy\Product\Command\Domain;

/**
 * Class ProductId
 * @package Shoppy\Product\Command\Domain
 */
class ProductId
{
    /**
     * @var int
     */
    private $id;

    /**
     * ProductId constructor.
     *
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->id;
    }
}
