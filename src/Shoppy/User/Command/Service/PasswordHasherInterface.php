<?php

namespace Shoppy\User\Command\Service;

/**
 * Interface PasswordHasherInterface
 * @package Shoppy\User\Command\Service
 */
interface PasswordHasherInterface
{
    /**
     * @param string $password
     *
     * @return string
     */
    public function hash(string $password): string;
}