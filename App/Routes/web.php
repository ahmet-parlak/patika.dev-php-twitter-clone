<?php

/* Middlewares */
$router->before('GET|POST', '/', 'Middlewares\AuthMiddleware@isLogin');




//Home
$router->get("/", 'Controllers\HomeController@index');


//Authorization
$router->get("/register", "Controllers\AuthController@registerPage"); //Register Page
$router->post("/register", "Controllers\AuthController@register"); //Register User

$router->get("/login", "Controllers\AuthController@loginPage"); //Login Page
$router->post("/login", "Controllers\AuthController@login"); //Login User

$router->get("/logout", "Controllers\AuthController@logout"); //Logout User


?>