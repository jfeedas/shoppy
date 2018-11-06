<?php

namespace Shoppy\User\Command\Value;

/**
 * Class NewShopManager
 * @package Shoppy\User\Command\Value
 */
class NewShopManager
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $phone;

    /**
     * NewShopManager constructor.
     *
     * @param string $name
     * @param string $email
     * @param string $phone
     * @param string $password
     */
    public function __construct(string $name, string $email, string $phone, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function phone(): string
    {
        return $this->phone;
    }
}
