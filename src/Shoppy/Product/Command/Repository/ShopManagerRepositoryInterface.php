<?php

namespace Shoppy\Product\Command\Repository;

use Shoppy\Product\Command\Entity\AbstractShopManager;

/**
 * Interface ShopManagerRepositoryInterface
 * @package Shoppy\Product\Command\Repository
 */
interface ShopManagerRepositoryInterface
{
    /**
     * @param string $managerId
     *
     * @return AbstractShopManager
     */
    public function getById(string $managerId): AbstractShopManager;
}
