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
     * @param string $productId
     */
    public function __construct(string $productId)
    {
        parent::__construct('Product ID: ' . $productId);
    }
}
