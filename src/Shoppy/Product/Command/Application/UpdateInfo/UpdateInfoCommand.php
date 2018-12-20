<?php

namespace Shoppy\Product\Command\Application\UpdateInfo;

use Shoppy\Product\Command\Domain\ProductDescription;
use Shoppy\Product\Command\Domain\ProductId;
use Shoppy\Product\Command\Domain\ProductPrice;
use Shoppy\Product\Command\Domain\ProductTitle;

/**
 * Interface UpdateInfoCommand
 * @package Shoppy\Product\Command\Application\UpdateInfo
 */
interface UpdateInfoCommand
{
    /**
     * @return ProductId
     */
    public function productId(): ProductId;

    /**
     * @return ProductTitle|null
     */
    public function title(): ?ProductTitle;

    /**
     * @return ProductDescription|null
     */
    public function description(): ?ProductDescription;

    /**
     * @return ProductPrice|null
     */
    public function price(): ?ProductPrice;
}
