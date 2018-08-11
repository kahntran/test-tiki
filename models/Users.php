<?php
/**
 * Created by PhpStorm.
 * User: ridingsolo
 * Date: 09/08/2018
 * Time: 22:41
 */

declare(strict_types=1);

namespace models;

use models\ShoppingCart;


class Users
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
     * @return Users
     */
    public static function getInstance(string $name, string $email) : Users
    {
        if (is_null(self::$user)) {
            self::$user = new Users($name, $email);
        }

        return self::$user;
    }

    /**
     * Initialize User's ShoppingCart
     */
    public function instanceShoppingCart()
    {
        $this->shoppingCart = ShoppingCart::getInstance(self::$user);
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * @return ShoppingCart
     */
    public function getShoppingCart() : ShoppingCart
    {
        return $this->shoppingCart;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @param ShoppingCart $shoppingCart
     */
    public function setShoppingCart(ShoppingCart $shoppingCart)
    {
        $this->shoppingCart = $shoppingCart;
    }
}
