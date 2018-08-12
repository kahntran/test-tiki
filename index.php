<?php

require_once 'vendor/autoload.php';

use App\models\User;
use App\models\ShoppingCart;
use App\models\Product;

echo '<br/>' . '<h3 align="center">Tiki Home Test</h3>' . '<br/>';

echo '<br/>' . '################# Initialize #################' . '<br/>';

$apple = new Product('Apple', 4.95);
echo '<br/>';
echo 'One Product is created :' . '<br/>';
echo 'Name : $' . $apple->getName() . '<br/>';
echo 'Price : $' . $apple->getPrice() . '<br/>';

$orange = new Product('Orange', 3.99);
echo '<br/>';
echo 'One Product is created :' . '<br/>';
echo 'Name : $' . $apple->getName() . '<br/>';
echo 'Price : $' . $apple->getPrice() . '<br/>';

$user = User::getInstance('John Doe', 'john.doe@example.com');
echo '<br/>';
echo 'One User is created :' . '<br/>';
$shoppingCart = ShoppingCart::getInstance($user);
echo $user->getName() . '\'s Shopping Cart is created :' . '<br/>';
echo 'Name : ' . $user->getName() . '<br/>';
echo 'Email : ' . $shoppingCart->getUser()->getEmail() . '<br/>';
echo 'Shopping Cart :' . '<br/>';
echo '<pre>';
print_r($user->getShoppingCart()->getProducts());
echo '</pre>';

echo '<br/>' . '################# Case 1 #################' . '<br/>';

$user->getShoppingCart()->add($apple, 2);
$user->getShoppingCart()->add($orange);
echo '<br/>';
echo 'Add Product is done :' . '<br/>';
echo '<pre>';
print_r($user->getShoppingCart()->getProducts());
echo '</pre>';
echo 'Total price : ' . $user->getShoppingCart()->getTotalPrice() . '<br/>';

echo '<br/>' . '################# Reset Singleton instance(s): User & Shopping Cart #################' . '<br/>';

$singletonUser = User::getInstance('John Doe', 'john.doe@example.com');
$singletonShoppingCart = ShoppingCart::getInstance($singletonUser);

$reflectionUser = new ReflectionClass($singletonUser);
$reflectionShoppingCart = new ReflectionClass($singletonShoppingCart);

$instanceUser = $reflectionUser->getProperty('user');
$instanceShoppingCart = $reflectionShoppingCart->getProperty('shoppingCart');

$instanceUser->setAccessible(true);
$instanceShoppingCart->setAccessible(true);

$instanceUser->setValue(null, null);
$instanceShoppingCart->setValue(null, null);

$instanceUser->setAccessible(false);
$instanceShoppingCart->setAccessible(false);

echo '<br/>' . 'Reset Singleton instance(s) is done.' . '<br/>';

echo '<br/>' . '################# Initialize #################' . '<br/>';

$apple = new Product('Apple', 4.95);
echo '<br/>';
echo 'One Product is created :' . '<br/>';
echo 'Name : $' . $apple->getName() . '<br/>';
echo 'Price : $' . $apple->getPrice() . '<br/>';

$orange = new Product('Orange', 3.99);
echo '<br/>';
echo 'One Product is created :' . '<br/>';
echo 'Name : $' . $apple->getName() . '<br/>';
echo 'Price : $' . $apple->getPrice() . '<br/>';

$user = User::getInstance('John Doe', 'john.doe@example.com');
echo '<br/>';
echo 'One User is created :' . '<br/>';
$shoppingCart = ShoppingCart::getInstance($user);
echo $user->getName() . '\'s Shopping Cart is created :' . '<br/>';
echo 'Name : ' . $user->getName() . '<br/>';
echo 'Email : ' . $shoppingCart->getUser()->getEmail() . '<br/>';
echo 'Shopping Cart :' . '<br/>';
echo '<pre>';
print_r($user->getShoppingCart()->getProducts());
echo '</pre>';

echo '<br/>' . '################# Case 2 #################' . '<br/>';

$user->getShoppingCart()->add($apple, 3);
$user->getShoppingCart()->add($orange);
echo '<br/>';
echo 'Add Product is done :' . '<br/>';
echo '<pre>';
print_r($user->getShoppingCart()->getProducts());
echo '</pre>';
echo 'Total price : ' . $user->getShoppingCart()->getTotalPrice() . '<br/>';

echo '<br/>';
$resultRemove = $shoppingCart->remove($apple);
if ($resultRemove) {
    echo 'Remove Product is done :' . '<br/>';
    echo '<pre>';
    print_r($shoppingCart->getProducts());
    echo '</pre>';
    echo 'Total price : ' . $user->getShoppingCart()->getTotalPrice() . '<br/>';
} else {
    echo 'Cant remove Product ' . $apple->getName() . '<br/>';
}

echo '<br/>' . '<h3 align="center">The End</h3>';
