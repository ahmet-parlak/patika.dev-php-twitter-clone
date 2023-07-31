<?php
//Controller Namespace
$router->setNamespace('App\Controllers');

//Web Routes
require BASEDIR . '/App/Routes/web.php';

//Run
$router->run();

?>