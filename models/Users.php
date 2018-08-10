<?php
/**
 * Created by PhpStorm.
 * User: ridingsolo
 * Date: 09/08/2018
 * Time: 22:41
 */

namespace models;

use models\ShoppingCart;


class Users
{
    private $name;
    private $email;

    private $shoppingCart;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getShoppingCart()
    {
        return $this->shoppingCart;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $shoppingCart
     */
    public function setShoppingCart(ShoppingCart $shoppingCart)
    {
        $this->shoppingCart = $shoppingCart;
    }

    function __construct($name = 'test', $email = 'abc@test.com')
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setShoppingCart(new ShoppingCart());
    }

    public function showInfo()
    {
        echo '<br>' . 'Name : ' . $this->getName();
        echo '<br>' . 'Email : ' . $this->getEmail();
    }

    public function showShoppingCart()
    {
        if ($this->shoppingCart instanceof ShoppingCart) {
            $this->shoppingCart->showInfo();
            return true;
        }

        return false;
    }

}
