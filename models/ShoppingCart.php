<?php
/**
 * Created by PhpStorm.
 * User: ridingsolo
 * Date: 09/08/2018
 * Time: 22:44
 */

declare(strict_types=1);

namespace models;

use models\Products;


class ShoppingCart
{
    private static $shoppingCart;

    private $listProducts;
    private $user;

    /**
     * ShoppingCart constructor.
     *
     * @param Users $user
     */
    private function __construct(Users $user)
    {
        $this->user = $user;
        $this->listProducts = [];
    }

    /**
     * Initialize Shopping Cart
     *
     * @param Users $user
     * @return ShoppingCart
     */
    public static function getInstance(Users $user) : ShoppingCart
    {
        if (is_null(self::$shoppingCart)) {
            self::$shoppingCart = new ShoppingCart($user);
        }

        return self::$shoppingCart;
    }

    /**
     * @return array
     */
    public function getListProducts() : array
    {
        return $this->listProducts;
    }

    /**
     * @return Users
     */
    public function getUser() : Users
    {
        return $this->user;
    }

    /**
     * @param array $listProducts
     */
    public function setListProducts(array $listProducts)
    {
        $this->listProducts = $listProducts;
    }

    /**
     * @param Users $user
     */
    public function setUser(Users $user)
    {
        $this->user = $user;
    }

    /**
     * Get total price in Shopping Cart
     *
     * @return float
     */
    public function getTotalPrice() : float
    {
        $totalPrice = 0.0;

        foreach ($this->listProducts as $product) {
            if ($product instanceof Products) {
                $totalPrice += $product->getPrice();
            }
        }

        return $totalPrice;
    }

    /**
     * Add Product into Shopping Cart
     *
     * @param \models\Products $product
     */
    public function addProduct(Products $product)
    {
        $this->listProducts[] = $product;
    }

    /**
     * Remove Product out of Shopping Cart
     *
     * @param int $index
     * @return bool
     */
    public function removeProduct($index = 0) : bool
    {
        $tmpListProduct = $this->getListProducts();

        if ( ! is_int($index) || $index <= 0 || $index > count($tmpListProduct) ) {
            return false;
        }

        unset($tmpListProduct[$index - 1]);

        $this->setListProducts($tmpListProduct);

        return true;
    }

    /**
     * Find Product by name in Shopping Cart
     *
     * @param string $productName
     * @return int
     */
    public function findProductByName(string $productName) : int
    {
        $tmpListProduct = $this->getListProducts();

        foreach ($tmpListProduct as $index => $product) {
            if ($product instanceof Products && $product->getName() === $productName) {
                return $index + 1;
            }
        }

        return 0;
    }
}
