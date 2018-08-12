# Steps to set up local:

1. File docker-compose.yml
    * Edit '/home/ridingsolo/Khanh/php/projects/pj01' into your local folder.

2. Move to folder docker.

3. Build Docker image
    * Use command: docker build -t [image name] .

4. Build Docker container
    * Use command: docker-compose up -d (or 'sudo docker-compose up -d') in Terminal.

5. Install Composer (and PHPUnit) into project
    * Connect to Docker Container 'web': docker-composer exec web bash
    * Install Composer (and PHPUnit): composer install
    * Create file autoload: composer dump-autoload

6. Testing
    * PHPUnit, use command: ./vendor/bin/phpunit
    * PHP script, use command: php index.php

7. Review result.

# Tiki Home Test
* This is a Tiki Home Test project.

Task:

Write a basic eCommerce program in PHP that models a User, Product and ShoppingCart.
* Products have a name and price.
* Users have a name and email address, and associated ShoppingCart.
* ShoppingCarts have an associated User and list of Products.
* A User can add or remove a Product from their ShoppingCart.
* A ShoppingCart must be able to provide a total price for its list of Products.
The code must pass two tests:
1. Create a User "John Doe" with email address "john.doe@example.com", then add 2 "Apple" Products
for $4.95 each and 1 "Orange" Product for $3.99. Check that the ShoppingCart total price is correct.
2. Create a User "John Doe" with email address "john.doe@example.com", then add 3 "Apple" products
for $4.95, then remove 1 "Apple" product. Check that the ShoppingCart total price is correct.
You may either use PHPUnit to run the tests, or a simple PHP script which can be run via the command
line.
Notes:
* You should NOT use a full-featured framework (Laravel, CakePHP, etc), just plain PHP code.
* No database, user interaction or other functionality is required (so no HTML/CSS/JavaScript); it just
needs to be PHP code which runs and passes the tests.

# Requirements
* Docker: php, apache, composer

# Assumption description
* 1 User has only 1 Shopping Cart :
    - When a user is already initialized then you can not initialize another user.
    - When initializing a Shopping Cart, you will have to assign a user: Create a user -> Create a Shopping Cart associated with the user.

# Design Pattern and programming paradigm
* OOP (Encapsulation) & SOLID (Open/Close principle): private variables & function get(), set().
* Singleton in User & Shopping Cart: private __construct() & public static getInstance(). 