<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use ReflectionClass;

use App\models\Product;
use App\models\User;
use App\models\ShoppingCart;

class TikiTest extends TestCase
{
    public function testCaseOne()
    {
        $apple = new Product('Apple', 4.95);
        $orange = new Product('Orange', 3.99);

        $user = User::getInstance('John Doe', 'john.doe@example.com');
        $shoppingCart = ShoppingCart::getInstance($user);

        $user->getShoppingCart()->add($apple, 2);
        $shoppingCart->add($orange);

        $expected = 13.89;
        $actual = $user->getShoppingCart()->getTotalPrice();

        $this->assertEquals($expected, $actual);
    }

    public function testCaseTwo()
    {
        // Reset Singleton instance(s): User & Shopping Cart
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
        // Finish reset

        $apple = new Product('Apple', 4.95);
        $orange = new Product('Orange', 3.99);

        $user = User::getInstance('John Doe', 'john.doe@example.com');
        $shoppingCart = ShoppingCart::getInstance($user);

        $user->getShoppingCart()->add($apple, 3);
        $shoppingCart->add($orange);
        $shoppingCart->remove($apple);

        $expected = 13.89;
        $actual = $user->getShoppingCart()->getTotalPrice();

        $this->assertEquals($expected, $actual);
    }
}
