<?php

namespace Shoppy\Product\Command\Domain;

/**
 * Class ProductTitle
 * @package Shoppy\Product\Command\Domain
 */
class ProductTitle
{
    /**
     * @var string
     */
    private $title;

    /**
     * ProductTitle constructor.
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
    public function value(): string
    {
        return $this->title;
    }
}
