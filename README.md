Need php 7+ and composer, should be fine with a standard php install

everything below is done from project root folder

dependancies can be installed via composer using

composer install

to run the project i used php inbuilt webserver

php -S localhost:8000

in browser you can now see the project by visiting http://localhost:8000

to run tests

./vendor/bin/phpunit --bootstrap vendor/autoload.php tests
