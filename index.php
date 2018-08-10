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


echo '<p> Hello world </p>';

function newLine()
{
    echo '<br><br>';
}

$user1 = new Users('John Doe', 'john.doe@example.com');
$user1->showInfo();

newLine();

$myShoppingCart = $user1->getShoppingCart();

$myShoppingCart->showInfo();

newLine();

$myShoppingCart->addProducts([
    [
        'name' => 'Apple',
        'price' => 4.95
    ],
    [
        'name' => 'Apple',
        'price' => 4.95
    ],
    [
        'name' => 'Orange',
        'price' => 3.99
    ]
]);

echo 'Products added.';

newLine();

$myShoppingCart->showInfo();

newLine();

echo 'Total price';

echo $myShoppingCart->showTotalPrice();

newLine();

echo '#########################################################';

newLine();

echo 'Add 1 Apple';

$myShoppingCart->addProducts([
    [
        'name' => 'Apple',
        'price' => 4.95
    ]
]);

echo '<br>';

echo 'Added 1 Apple';

newLine();

$myShoppingCart->showInfo();

newLine();

echo 'Total price';

echo $myShoppingCart->showTotalPrice();

newLine();

echo '#########################################################';

newLine();

echo 'Remove 1 Apple';
echo '<br>';

$indexRemoveProduct = $myShoppingCart->findProductByName('Apple');

if ($indexRemoveProduct !== false) {
    $resultRemove = $myShoppingCart->removeProduct($indexRemoveProduct);

    if ($resultRemove) {
        echo 'Removed 1 Apple';
    } else {
        echo 'Cant remove product.';
    }
} else {
    echo 'No product named Apple in List Product.';
}

newLine();

$myShoppingCart->showInfo();

newLine();

echo 'Total price';

echo $myShoppingCart->showTotalPrice();

newLine();

echo 'The End';
