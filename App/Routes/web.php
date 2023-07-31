<?php

$router->get("/", 'HomeController@index');

//Authorization
$router->get("/register", "AuthController@registerPage"); //Register Page
$router->post("/register", "AuthController@register"); //Register User

$router->get("/login", "AuthController@loginPage"); //Login Page
$router->post("/login", "AuthController@login"); //Login User

$router->get("/logout", "AuthController@logout"); //Logout User


?>