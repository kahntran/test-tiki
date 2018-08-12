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

6. Testing
    * On browser: http://localhost:8100 to access Web.
    * On Terminal: ./vendor/bin/phpunit

7. Review result.

# Tiki Home Test
* This is a Tiki Home Test project.

# Requirements
* Docker: php, apache, composer, phpunit

# Assumption description
* 1 User has only 1 Shopping Cart :
    - When a user is already initialized then you can not initialize another user.
    - When initializing a Shopping Cart, you will have to assign a user: Create a user -> Create a Shopping Cart associated with the user.

# Algorithm description
* OOP (Encapsulation) & SOLID (Open/Close principle): private variables & function get(), set().
* Singleton in User & Shopping Cart: private __construct() & public static getInstance(). 