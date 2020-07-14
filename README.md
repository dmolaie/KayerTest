# KayerTest
this repository for test company kayer

Command for run project:

1- first you must be install Docker and Docker-Compose in yor system.
2- pull project
3- in directoy project after pull you will run below commands:
  -docker-compose up -d --build
  -docker-compose run php-fpm composer update
  -docker-compose run php-fpm composer dump
  -create file .env in directory root project and config for example database name : kayer and etc.
  -docker-compose run php-fpm php artisan cache:clear
  -docker-compose run php-fpm php artisan config:cache
  -docker-compose run php-fpm php artisan storage:link
  -docker-compose run php-fpm php artisan migrate
  
4- this project we  use diffrence layers for example Servic - Repository - Entity and we have 4 API include:
  1-http://localhost/api/group/create     this is POST Method and field is: 1-name  2-title 3-description
    
  2-http://localhost/api/product/create   this is POST Method and field is: 1-group_id  2-count_product
   
  3-http://localhost/api/cart/list        this is POST Method and field is: 1-user_id
  
  4-http://localhost/api/invoice/create   this is POST Method and field is: 1-cart_id 2-user_id