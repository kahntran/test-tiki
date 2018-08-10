<?php
/**
 * Created by PhpStorm.
 * User: ridingsolo
 * Date: 09/08/2018
 * Time: 22:37
 */

namespace models;


class Products
{
    private $name;
    private $price;

    function __construct($name = 'test', $price = 0)
    {
        $this->setName($name);
        $this->setPrice($price);
    }

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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function showInfo()
    {
        echo '<br>' . 'Product Info : ';
        echo '<br>' . 'Name : ' . $this->getName();
        echo '<br>' . 'Price : ' . $this->getPrice();
        echo '<br>';
    }

}
