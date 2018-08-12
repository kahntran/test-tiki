<?php

declare(strict_types=1);

namespace App\models;

use App\models\ShoppingCart;


class User
{
    private static $user;

    private $name;
    private $email;
    private $shoppingCart;

    /**
     * Users constructor.
     *
     * @param string $name
     * @param string $email
     */
    private function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Initialize User
     *
     * @param string $name
     * @param string $email
     * @return User
     */
    public static function getInstance(string $name, string $email) : User
    {
        if (is_null(self::$user)) {
            self::$user = new User($name, $email);
        }

        return self::$user;
    }

    /**
     * Initialize User's ShoppingCart
     */
    public function initializeShoppingCart() : void
    {
        $this->shoppingCart = ShoppingCart::getInstance(self::$user);
    }

    /**
     * @return mixed
     */
    public function getShoppingCart()
    {
        return $this->shoppingCart;
    }

    /**
     * @param mixed $shoppingCart
     */
    public function setShoppingCart($shoppingCart): void
    {
        $this->shoppingCart = $shoppingCart;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }
}
