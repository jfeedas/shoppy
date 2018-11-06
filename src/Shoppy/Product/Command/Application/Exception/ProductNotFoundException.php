<?php

namespace Shoppy\Product\Command\Application\Exception;

/**
 * Class ProductNotFoundException
 * @package Shoppy\Product\Command\Application\Exception
 */
class ProductNotFoundException extends \Exception
{
    /**
     * ProductNotFoundException constructor.
     *
     * @param int $productId
     */
    public function __construct(int $productId)
    {
        parent::__construct('Product ID: ' . $productId);
    }
}
