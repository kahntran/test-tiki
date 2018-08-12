<?php

require_once 'vendor/autoload.php';

use App\models\User;
use App\models\ShoppingCart;
use App\models\Product;

echo "\n" . 'Tiki Home Test' . "\n";

echo "\n" . '################# Initialize #################' . "\n";

$apple = new Product('Apple', 4.95);
echo "\n";
echo 'One Product is created :' . "\n";
echo 'Name : $' . $apple->getName() . "\n";
echo 'Price : $' . $apple->getPrice() . "\n";

$orange = new Product('Orange', 3.99);
echo "\n";
echo 'One Product is created :' . "\n";
echo 'Name : $' . $apple->getName() . "\n";
echo 'Price : $' . $apple->getPrice() . "\n";

$user = User::getInstance('John Doe', 'john.doe@example.com');
echo "\n";
echo 'One User is created :' . "\n";
$shoppingCart = ShoppingCart::getInstance($user);
echo $user->getName() . '\'s Shopping Cart is created :' . "\n";
echo 'Name : ' . $user->getName() . "\n";
echo 'Email : ' . $shoppingCart->getUser()->getEmail() . "\n";
echo 'Shopping Cart :' . "\n";
print_r($user->getShoppingCart()->getProducts());

echo "\n" . '################# Case 1 #################' . "\n";

$user->getShoppingCart()->add($apple, 2);
$user->getShoppingCart()->add($orange);
echo "\n";
echo 'Add Product is done :' . "\n";
print_r($user->getShoppingCart()->getProducts());
echo 'Total price : ' . $user->getShoppingCart()->getTotalPrice() . "\n";

echo "\n" . '################# Reset Singleton instance(s): User & Shopping Cart #################' . "\n";

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

echo "\n" . 'Reset Singleton instance(s) is done.' . "\n";

echo "\n" . '################# Initialize #################' . "\n";

$apple = new Product('Apple', 4.95);
echo "\n";
echo 'One Product is created :' . "\n";
echo 'Name : $' . $apple->getName() . "\n";
echo 'Price : $' . $apple->getPrice() . "\n";

$orange = new Product('Orange', 3.99);
echo "\n";
echo 'One Product is created :' . "\n";
echo 'Name : $' . $apple->getName() . "\n";
echo 'Price : $' . $apple->getPrice() . "\n";

$user = User::getInstance('John Doe', 'john.doe@example.com');
echo "\n";
echo 'One User is created :' . "\n";
$shoppingCart = ShoppingCart::getInstance($user);
echo $user->getName() . '\'s Shopping Cart is created :' . "\n";
echo 'Name : ' . $user->getName() . "\n";
echo 'Email : ' . $shoppingCart->getUser()->getEmail() . "\n";
echo 'Shopping Cart :' . "\n";
print_r($user->getShoppingCart()->getProducts());

echo "\n" . '################# Case 2 #################' . "\n";

$user->getShoppingCart()->add($apple, 3);
$user->getShoppingCart()->add($orange);
echo "\n";
echo 'Add Product is done :' . "\n";
print_r($user->getShoppingCart()->getProducts());
echo 'Total price : ' . $user->getShoppingCart()->getTotalPrice() . "\n";

echo "\n";
$resultRemove = $shoppingCart->remove($apple);
if ($resultRemove) {
    echo 'Remove Product is done :' . "\n";
    print_r($shoppingCart->getProducts());
    echo 'Total price : ' . $user->getShoppingCart()->getTotalPrice() . "\n";
} else {
    echo 'Cant remove Product ' . $apple->getName() . "\n";
}

echo "\n" . 'The End';
