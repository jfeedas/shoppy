<?php

namespace Shoppy\Product\Command\Domain;

use Shoppy\Product\Command\Domain\Event\DescriptionChanged;
use Shoppy\Product\Command\Domain\Event\ImageAssigned;
use Shoppy\Product\Command\Domain\Event\PriceChanged;
use Shoppy\Product\Command\Domain\Event\TitleChanged;

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

    /**
     * @param ProductTitle $title
     *
     * @return mixed
     */
    public function changeTitle(ProductTitle $title): TitleChanged;

    /**
     * @param ProductDescription $description
     *
     * @return DescriptionChanged
     */
    public function changeDescription(ProductDescription $description): DescriptionChanged;

    /**
     * @param ProductPrice $price
     *
     * @return PriceChanged
     */
    public function changePrice(ProductPrice $price): PriceChanged;
}
