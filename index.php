<?php
/**
 * Created by PhpStorm.
 * User: ridingsolo
 * Date: 09/08/2018
 * Time: 23:27
 */

define('__ROOT__', dirname(__FILE__));

require_once __ROOT__.'/models/Users.php';
require_once __ROOT__.'/models/ShoppingCart.php';
require_once __ROOT__.'/models/Products.php';

use models\Users;
use models\ShoppingCart;
use models\Products;

echo '<br/>' . '<h3 align="center">Tiki Home Test</h3>' . '<br/>';

echo '################# Initialize #################';

$apple = new Products('Apple', 4.95);
echo '<br/>';
echo 'One Product is created :' . '<br/>';
echo 'Name : $' . $apple->getName() . '<br/>';
echo 'Price : $' . $apple->getPrice() . '<br/>';

$orange = new Products('Orange', 3.99);
echo '<br/>';
echo 'One Product is created :' . '<br/>';
echo 'Name : $' . $apple->getName() . '<br/>';
echo 'Price : $' . $apple->getPrice() . '<br/>';

$user = Users::getInstance('John Doe', 'john.doe@example.com');
echo '<br/>';
echo 'One User is created :' . '<br/>';
echo 'Name : ' . $user->getName() . '<br/>';
echo 'Email : ' . $user->getEmail() . '<br/>';

$user->instanceShoppingCart($user);
echo '<br/>';
echo $user->getName() . '\'s Shopping Cart is created :' . '<br/>';
echo '<pre>';
print_r($user->getShoppingCart()->getListProducts());
echo '</pre>';

echo '<br/>' . '################# Case 1 #################' . '<br/>';

$user->getShoppingCart()->addProduct($apple);
$user->getShoppingCart()->addProduct($apple);
$user->getShoppingCart()->addProduct($orange);
echo '<br/>';
echo 'Add Product is done :' . '<br/>';
echo '<pre>';
print_r($user->getShoppingCart()->getListProducts());
echo '</pre>';
echo 'Total price : ' . $user->getShoppingCart()->getTotalPrice() . '<br/>';

echo '<br/>' . '################# Case 2 #################' . '<br/>';

$user->getShoppingCart()->addProduct($apple);
echo '<br/>';
echo 'Add Product is done :' . '<br/>';
echo '<pre>';
print_r($user->getShoppingCart()->getListProducts());
echo '</pre>';
echo 'Total price : ' . $user->getShoppingCart()->getTotalPrice() . '<br/>';

$shoppingCart = ShoppingCart::getInstance($user);
$indexApple = $shoppingCart->findProductByName('Apple');
echo '<br/>';
if ($indexApple === 0) {
    echo 'Cant find Product' . '<br/>';
} else {
    $resultRemove = $shoppingCart->removeProduct($indexApple);
    if ($resultRemove) {
        echo 'Remove Product is done :' . '<br/>';
        echo '<pre>';
        print_r($shoppingCart->getListProducts());
        echo '</pre>';
        echo 'Total price : ' . $user->getShoppingCart()->getTotalPrice() . '<br/>';
    } else {
        echo 'Cant remove Product at index : ' . $indexApple . '<br/>';
    }
}

echo '<br/>' . '<h3 align="center">The End</h3>';
