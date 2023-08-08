<?php
//Controller Namespace
$router->setNamespace('\App');

//Web Routes
require BASEDIR . '/App/Routes/web.php';

//Run
$router->run();

?>