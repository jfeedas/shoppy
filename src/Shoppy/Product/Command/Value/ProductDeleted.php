<?php

namespace Shoppy\Product\Command\Value;

/**
 * Class ProductDeleted
 * @package Shoppy\Product\Command\Value
 */
class ProductDeleted
{
    /**
     * @var string
     */
    private $managerId;

    /**
     * @var string
     */
    private $productId;

    /**
     * ProductDeleted constructor.
     *
     * @param string $managerId
     * @param string $productId
     */
    public function __construct(string $managerId, string $productId)
    {
        $this->managerId = $managerId;
        $this->productId = $productId;
    }

    /**
     * @return string
     */
    public function getManagerId(): string
    {
        return $this->managerId;
    }

    /**
     * @return string
     */
    public function getProductId(): string
    {
        return $this->productId;
    }
}
