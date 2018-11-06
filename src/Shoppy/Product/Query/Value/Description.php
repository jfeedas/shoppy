<?php

namespace Shoppy\Product\Query\Value;

/**
 * Class Description
 * @package Shoppy\Product\Query\Value
 */
class Description
{
    /**
     * @var string
     */
    private $description;

    /**
     * Description constructor.
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
    public function toString(): string
    {
        return $this->description;
    }
}
