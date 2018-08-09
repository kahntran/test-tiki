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

$user1->getShoppingCart()->showInfo();

newLine();

$result = $user1->getShoppingCart()->addProducts([
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

$user1->getShoppingCart()->showInfo();

newLine();

echo 'The End';
