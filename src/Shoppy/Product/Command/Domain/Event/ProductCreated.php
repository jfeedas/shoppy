<?php

namespace Shoppy\Product\Command\Domain\Event;

use Shoppy\Product\Command\Domain\ProductId;

/**
 * Class ProductCreated
 * @package Shoppy\Product\Command\Domain\Event
 */
class ProductCreated
{
    /**
     * @var ProductId
     */
    private $id;

    /**
     * ProductCreated constructor.
     *
     * @param ProductId $id
     */
    public function __construct(ProductId $id)
    {
        $this->id = $id;
    }
}
