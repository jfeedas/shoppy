<?php

namespace Shoppy\User\Command\Entity;

/**
 * Interface ShopManagerInterface
 * @package Shoppy\User\Command\Entity
 */
interface ShopManagerInterface
{
    /**
     * @param int $id
     *
     * @return bool
     */
    public function assignCreatorId(int $id): bool;

    /**
     * @return string
     */
    public function getPassword(): string;
}
