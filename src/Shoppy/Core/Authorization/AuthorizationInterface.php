<?php

namespace Shoppy\Core\Authorization;

/**
 * Interface AuthorizationInterface
 * @package Shoppy\Core\Authorization
 */
interface AuthorizationInterface
{
    /**
     * @param string $token
     *
     * @return array
     */
    public function authorize(string $token): array;

    /**
     * @param array $data
     *
     * @return string
     */
    public function getToken(array $data): string;
}
