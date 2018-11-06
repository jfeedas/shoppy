<?php

namespace Shoppy\User\Command\Repository;

use Shoppy\User\Command\Entity\AbstractShopManager;

/**
 * Interface ShopManagerRepositoryInterface
 * @package Shoppy\User\Command\Repository
 */
interface ShopManagerRepositoryInterface
{
    /**
     * @param AbstractShopManager $abstractShopManager
     *
     * @return bool
     */
    public function persist(AbstractShopManager $abstractShopManager): bool;

    /**
     * @param int $managerId
     *
     * @return AbstractShopManager
     */
    public function getById(int $managerId): ?AbstractShopManager;

    /**
     * @param AbstractShopManager $shopManager
     *
     * @return bool
     */
    public function delete(AbstractShopManager $shopManager): bool;

    /**
     * @param string $email
     *
     * @return null|AbstractShopManager
     */
    public function getByEmail(string $email): ?AbstractShopManager;
}
