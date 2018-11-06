<?php

namespace Shoppy\User\Command\Value;

use Shoppy\User\Command\Entity\AbstractShopManager;
use Shoppy\User\Command\Factory\ShopManagerFactoryInterface;

/**
 * Class System
 * @package Shoppy\User\Command\Value
 */
abstract class System
{
    /**
     * @param NewShopManager $shopManager
     *
     * @return AbstractShopManager
     * @throws \Exception
     */
    public function createShopManager(NewShopManager $shopManager): AbstractShopManager
    {
        $manager = $this->getShopManagerFactory()
            ->buildFromNewShopManager($shopManager);

        $manager->assignCreatorId(0);
        return $manager;
    }

    /**
     * @return ShopManagerFactoryInterface
     */
    abstract protected function getShopManagerFactory(): ShopManagerFactoryInterface;
}