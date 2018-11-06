<?php


namespace Shoppy\User\Command\Application;

use Shoppy\Core\Authorization\AuthorizationInterface;
use Shoppy\User\Command\Application\Exception\ManagerAuthenticationException;
use Shoppy\User\Command\Repository\ShopManagerRepositoryInterface;
use Shoppy\User\Command\Service\PasswordHasherInterface;

/**
 * Class AbstractAuthenticateManager
 * @package Shoppy\User\Command\Application
 */
class AbstractAuthenticateManager
{
    /**
     * @var ShopManagerRepositoryInterface
     */
    private $shopManagerRepository;

    /**
     * @var PasswordHasherInterface
     */
    private $passwordHasher;

    /**
     * @var AuthorizationInterface
     */
    private $authorizationService;

    /**
     * AbstractAuthenticateManager constructor.
     *
     * @param ShopManagerRepositoryInterface $shopManagerRepository
     * @param PasswordHasherInterface $passwordHasher
     * @param AuthorizationInterface $authorizationService
     */
    public function __construct(
        ShopManagerRepositoryInterface $shopManagerRepository,
        PasswordHasherInterface $passwordHasher,
        AuthorizationInterface $authorizationService
    ) {
        $this->shopManagerRepository = $shopManagerRepository;
        $this->passwordHasher = $passwordHasher;
        $this->authorizationService = $authorizationService;
    }

    /**
     * @param string $email
     * @param string $password
     *
     * @return string
     * @throws ManagerAuthenticationException
     */
    public function authenticate(string $email, string $password): string
    {
        $manager = $this->shopManagerRepository->getByEmail($email);
        if ($manager === null) {
            throw new ManagerAuthenticationException('Incorrect email or password');
        }

        if ($manager->getPassword() != $this->passwordHasher->hash($password)) {
            throw new ManagerAuthenticationException('Incorrect email or password');
        }

        return $this->authorizationService->getToken(['id' => $manager->id()]);
    }
}