<?php

namespace Shoppy\Product\Command\Domain;

/**
 * Class ProductDescription
 * @package Shoppy\Product\Command\Domain
 */
class ProductDescription
{
    /**
     * @var string
     */
    private $description;

    /**
     * ProductTitle constructor.
     *
     * @param string $description
     */
    public function __construct(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->description;
    }
}
