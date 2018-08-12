<?php

declare(strict_types=1);

namespace App\models;

use App\models\Product;


class ShoppingCart
{
    private static $shoppingCart;

    private $products;
    private $user;

    /**
     * ShoppingCart constructor.
     *
     * @param User $user
     */
    private function __construct(User $user)
    {
        $this->user = $user;
        $this->products = [];
    }

    /**
     * Initialize Shopping Cart
     *
     * @param User $user
     * @return ShoppingCart
     */
    public static function getInstance(User $user) : ShoppingCart
    {
        if (is_null(self::$shoppingCart)) {
            self::$shoppingCart = new ShoppingCart($user);
            if (is_null($user->getShoppingCart())) {
                $user->setShoppingCart(self::$shoppingCart);
            }
        }

        return self::$shoppingCart;
    }

    /**
     * @return array
     */
    public function getProducts() : array
    {
        return $this->products;
    }

    /**
     * @param array $products
     */
    public function setProducts(array $products)
    {
        $this->products = $products;
    }

    /**
     * @return User
     */
    public function getUser() : User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user) : void
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

        foreach ($this->products as $item) {
            if ($item['product'] instanceof Product) {
                $totalPrice += $item['product']->getPrice() * $item['quantity'];
            }
        }

        return $totalPrice;
    }

    /**
     * Add Product into Shopping Cart
     *
     * @param \App\models\Product $product
     * @param int $quantity
     * @return bool
     */
    public function add(Product $product, int $quantity = 1) : bool
    {
        if ($quantity < 1) {
            return false;
        }
        
        $indexProduct = $this->findProductByName($product);
        
        if ($indexProduct === 0) {
            $this->products[] = [
                'product' => $product,
                'quantity' => $quantity
            ];
            return true;
        }
        
        $this->products[$indexProduct - 1]['product'] = $product;
        $this->products[$indexProduct - 1]['quantity'] += $quantity;
        return true;
    }

    /**
     * Remove Product out of Shopping Cart
     *
     * @param \App\models\Product $product
     * @param int $quantity
     * @return bool
     */
    public function remove(Product $product, int $quantity = 1) : bool
    {
        $indexProduct = $this->findProductByName($product);

        if ( $indexProduct < 1) {
            return false;
        }

        if ($this->products[$indexProduct - 1]['quantity'] <= $quantity) {
            unset($this->products[$indexProduct - 1]);
            return true;
        }

        $this->products[$indexProduct - 1]['quantity'] -= $quantity;
        return true;
    }

    /**
     * Find Product by name in Shopping Cart
     *
     * @param \App\models\Product $product
     * @return int
     */
    public function findProductByName(Product $product) : int
    {
        foreach ($this->products as $index => $item) {
            if ($item['product'] instanceof Product && $item['product']->getName() === $product->getName()) {
                return $index + 1;
            }
        }

        return 0;
    }
}
