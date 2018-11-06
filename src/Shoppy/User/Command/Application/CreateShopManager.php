<?php

namespace Shoppy\User\Command\Application;

use Shoppy\User\Command\Entity\AbstractShopManager;
use Shoppy\User\Command\Repository\ShopManagerRepositoryInterface;
use Shoppy\User\Command\Service\PasswordHasherInterface;
use Shoppy\User\Command\Value\NewShopManager;
use Shoppy\User\Command\Value\System;

/**
 * Class CreateShopManager
 * @package Shoppy\User\Command\Application
 */
abstract class CreateShopManager
{
    /**
     * @var ShopManagerRepositoryInterface
     */
    private $shopManagerRepository;

    /**
     * CreateShopManager constructor.
     *
     * @param ShopManagerRepositoryInterface $shopManagerRepository
     */
    public function __construct(ShopManagerRepositoryInterface $shopManagerRepository)
    {
        $this->shopManagerRepository = $shopManagerRepository;
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $phone
     * @param string $password
     *
     * @return int
     * @throws \Exception
     */
    public function create(string $name, string $email, string $phone, string $password): int
    {
        $system = $this->getSystem();

        $manager = $system->createShopManager(new NewShopManager(
            $name,
            $email,
            $phone,
            $this->getPasswordHasher()->hash($password)
        ));

        $this->shopManagerRepository->persist($manager);
        return $manager->id();
    }

    /**
     * @return System
     */
    abstract protected function getSystem(): System;

    /**
     * @return PasswordHasherInterface
     */
    abstract protected function getPasswordHasher(): PasswordHasherInterface;
}
