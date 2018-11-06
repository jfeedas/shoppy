<?php

namespace Shoppy\Product\Command\Value;

/*
 *
 */

class ProductDeleted
{
    /**
     * @var int
     */
    private $managerId;

    /**
     * @var int
     */
    private $productId;

    /**
     * ProductDeleted constructor.
     *
     * @param int $managerId
     * @param int $productId
     */
    public function __construct(int $managerId, int $productId)
    {
        $this->managerId = $managerId;
        $this->productId = $productId;
    }

    /**
     * @return int
     */
    public function getManagerId(): int
    {
        return $this->managerId;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }
}
