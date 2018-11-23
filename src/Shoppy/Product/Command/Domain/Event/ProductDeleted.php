<?php

namespace Shoppy\Product\Command\Domain\Event;

use Shoppy\Product\Command\Domain\ProductId;

/**
 * Class ProductDeleted
 * @package Shoppy\Product\Command\Domain\Event
 */
class ProductDeleted
{
    /**
     * @var ProductId
     */
    private $id;

    /**
     * ProductDeleted constructor.
     *
     * @param ProductId $id
     */
    public function __construct(ProductId $id)
    {
        $this->id = $id;
    }
}
