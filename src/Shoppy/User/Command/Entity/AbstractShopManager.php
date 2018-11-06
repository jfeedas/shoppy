<?php

namespace Shoppy\User\Command\Entity;

use Shoppy\Core\AbstractEntity;

/**
 * Class AbstractShopManager
 * @package Shoppy\User\Command\Entity
 */
abstract class AbstractShopManager extends AbstractEntity implements ShopManagerInterface
{
    /**
     * @param int $id
     *
     * @return bool
     * @throws \Exception
     */
    public function assignCreatorId(int $id): bool
    {
        $creatorId = $this->getDataField('creator_id');
        if ($creatorId !== null) {
            throw new \Exception('Creator id already assigned');
        }

        $this->setDataField('creator_id', $id);
        return true;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->getDataField('password');
    }
}
