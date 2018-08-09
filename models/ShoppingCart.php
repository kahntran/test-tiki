<?php
/**
 * Created by PhpStorm.
 * User: ridingsolo
 * Date: 09/08/2018
 * Time: 22:44
 */

namespace models;

use models\Products;


class ShoppingCart
{
    private $listProducts;

    private $user;

    /**
     * @return mixed
     */
    public function getListProducts()
    {
        return $this->listProducts;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $listProducts
     */
    public function setListProducts(array $listProducts)
    {
        $this->listProducts = $listProducts;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    public function addProduct(Products $product)
    {
        $this->listProducts[] = $product;
    }

    public function addProducts(array $listProduct)
    {
        foreach ($listProduct as $product) {
            $this->addProduct(new Products($product['name'], $product['price']));
        }
    }

    public function removeProduct($index = 0)
    {
        $tmpListProduct = $this->getListProducts();

        if ( ! is_int($index) || $index < 0 || $index > count($tmpListProduct) - 1 ) {
            return false;
        }

        unset($tmpListProduct[$index]);

        $this->setListProducts($tmpListProduct);

        return true;
    }

    public function findProductByName($productName)
    {
        $tmpListProduct = $this->getListProducts();

        foreach ($tmpListProduct as $index => $product) {

            if ($product instanceof Products && $product->getName() === $productName) {
                return $index;
            }
        }

        return false;
    }

    public function showInfo()
    {
        $tmpListProduct = $this->getListProducts();

        if (empty($tmpListProduct)) {
            echo 'List Products is empty';
            return;
        }

        echo '<br>' . 'List Products : ';

        foreach ($tmpListProduct as $index => $product) {

            if ($product instanceof Products) {
                $product->showInfo();
                continue;
            }

            echo '<br>' . 'Product at index : ' . $index . ' is not a Product.';
        }
    }
}