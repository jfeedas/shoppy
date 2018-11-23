<?php

namespace Shoppy\Product\Command\Domain;

use Shoppy\Product\Command\Domain\Event\ImageAssigned;

/**
 * Class Product
 * @package Shoppy\Product\Command\Domain
 */
interface Product
{
    /**
     * @return null|ProductId
     */
    public function id(): ?ProductId;

    /**
     * @param ProductImage $image
     * @param int|null $position
     *
     * @return mixed
     */
    public function assignImage(ProductImage $image, ?int $position = null): ImageAssigned;
}
