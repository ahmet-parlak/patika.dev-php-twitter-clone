<?php

/* Middlewares */
$router->before('GET|POST', '/', 'Middlewares\AuthMiddleware@auth'); //must be authenticated to access the home page 
$router->before('GET|POST', '/tweet', 'Middlewares\AuthMiddleware@auth'); //must be authenticated to access the home page 
$router->before('GET|POST', '/logout', 'Middlewares\AuthMiddleware@auth'); //must be authenticated to access the log out 
$router->before('GET|POST', '/login', 'Middlewares\AuthMiddleware@notAuth'); //must be logged out to access the login page
$router->before('GET|POST', '/register', 'Middlewares\AuthMiddleware@notAuth'); //must be logged out to access the registration page
$router->before('GET|POST', '/user/.*', 'Middlewares\AuthMiddleware@auth'); //must be authenticated to access the user page 
$router->before('GET|POST', '/profile', 'Middlewares\AuthMiddleware@auth'); //must be authenticated to access the profile page 
$router->before('GET|POST', '/friends', 'Middlewares\AuthMiddleware@auth'); //must be authenticated to access the friends feed 
$router->before('GET|POST', '/discover', 'Middlewares\AuthMiddleware@auth'); //must be authenticated to access the discover feed


//Home
$router->get("/", 'Controllers\HomeController@index'); //Home Page

$router->post("/friends", 'Controllers\HomeController@friends'); //Friends feed
$router->post("/discover", 'Controllers\HomeController@discover'); //Discover feed


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
$router->post('/user/([a-zA-Z0-9_]+)/friendship-request', 'Controllers\UserController@friendshipRequest'); //friendship request

//Profile
$router->get("/profile", 'Controllers\ProfileController@index'); //User page
$router->post("/profile/username", 'Controllers\ProfileController@updateUsername'); //Update username
$router->post("/profile/name", 'Controllers\ProfileController@updateName'); //Update name
$router->post("/profile/photo", 'Controllers\ProfileController@updatePhoto'); //Update photo
$router->post("/profile/about", 'Controllers\ProfileController@updateAbout'); //Update about
$router->post("/profile/password", 'Controllers\ProfileController@updatePassword'); //Update password


//Friends
$router->get("/friends", 'Controllers\FriendsController@index'); //Friends Page
$router->get("/friends/requests", 'Controllers\FriendsController@requests'); //Requests Page



//404
$router->set404('Controllers\ErrorController@_404');

?>