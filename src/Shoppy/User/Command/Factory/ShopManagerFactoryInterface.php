<?php

namespace Shoppy\User\Command\Factory;

use Shoppy\User\Command\Entity\AbstractShopManager;
use Shoppy\User\Command\Value\NewShopManager;

/**
 * Interface ShopManagerFactoryInterface
 * @package Shoppy\User\Command\Factory
 */
interface ShopManagerFactoryInterface
{
    /**
     * @param NewShopManager $shopManager
     *
     * @return AbstractShopManager
     */
    public function buildFromNewShopManager(NewShopManager $shopManager): AbstractShopManager;

    /**
     * @param array $data
     *
     * @return AbstractShopManager
     */
    public function buildFromArray(array $data): AbstractShopManager;
}
