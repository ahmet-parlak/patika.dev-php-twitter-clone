<?php

/* Middlewares */
$router->before('GET|POST', '/', 'Middlewares\AuthMiddleware@auth'); //must be authenticated to access the home page 
$router->before('GET|POST', '/tweet', 'Middlewares\AuthMiddleware@auth'); //must be authenticated to access the home page 
$router->before('GET|POST', '/logout', 'Middlewares\AuthMiddleware@auth'); //must be authenticated to access the log out 
$router->before('GET|POST', '/login', 'Middlewares\AuthMiddleware@notAuth'); //must be logged out to access the login page
$router->before('GET|POST', '/register', 'Middlewares\AuthMiddleware@notAuth'); //must be logged out to access the registration page
$router->before('GET|POST', '/user/.*', 'Middlewares\AuthMiddleware@auth'); //must be authenticated to access the user page 
$router->before('GET|POST', '/profile', 'Middlewares\AuthMiddleware@auth'); //must be authenticated to access the profile page 



//Home
$router->get("/", 'Controllers\HomeController@index'); //Home Page


//Authorization
$router->get("/register", "Controllers\AuthController@registerPage"); //Register Page
$router->post("/register", "Controllers\AuthController@register"); //Register User

$router->get("/login", "Controllers\AuthController@loginPage"); //Login Page
$router->post("/login", "Controllers\AuthController@login"); //Login User

$router->post("/logout", "Controllers\AuthController@logout"); //Logout User


//Tweet
$router->post("/tweet", 'Controllers\TweetController@tweet'); //Tweet


//User
$router->get("/user/([a-zA-Z0-9_]+)", 'Controllers\UserController@index'); //User page


//Profile
$router->get("/profile", 'Controllers\ProfileController@index'); //User page


//404
$router->set404('Controllers\ErrorController@_404');

?>