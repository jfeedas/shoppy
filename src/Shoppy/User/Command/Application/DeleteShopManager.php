<?php

namespace Shoppy\User\Command\Application;

use Shoppy\User\Command\Application\Exception\ShopManagerNotFoundException;
use Shoppy\User\Command\Repository\ShopManagerRepositoryInterface;

/**
 * Class DeleteShopManager
 * @package Shoppy\User\Command\Application
 */
abstract class DeleteShopManager
{
    /**
     * @var ShopManagerRepositoryInterface
     */
    private $shopManagerRepository;

    /**
     * DeleteShopManager constructor.
     *
     * @param ShopManagerRepositoryInterface $shopManagerRepository
     */
    public function __construct(ShopManagerRepositoryInterface $shopManagerRepository)
    {
        $this->shopManagerRepository = $shopManagerRepository;
    }

    /**
     * @param int $managerId
     *
     * @return bool
     * @throws ShopManagerNotFoundException
     */
    public function delete(int $managerId): bool
    {
        $manager = $this->shopManagerRepository->getById($managerId);
        if ($manager === null) {
            throw new ShopManagerNotFoundException('Manager id: ' . $managerId);
        }

        return $this->shopManagerRepository->delete($manager);
    }
}
