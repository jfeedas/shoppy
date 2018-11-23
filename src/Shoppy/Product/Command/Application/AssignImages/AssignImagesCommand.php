<?php

namespace Shoppy\Product\Command\Application\AssignImages;

use Shoppy\Product\Command\Domain\ProductId;
use Shoppy\Product\Command\Domain\ProductImage;

/**
 * Class AssignImagesCommand
 * @package Shoppy\Product\Command\Application\AssignImages
 */
interface AssignImagesCommand
{
    /**
     * @return ProductId
     */
    public function productId(): ProductId;

    /**
     * @return array|ProductImage[]
     */
    public function getImages(): array ;
}
