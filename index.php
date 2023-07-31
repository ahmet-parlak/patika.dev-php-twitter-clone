<?php
use Core\Starter;

require __DIR__ . '/config.php';
require BASEDIR . '/vendor/autoload.php';

$app = new Starter();
$router = $app->router;

require BASEDIR . '/App/Routes/Route.php';

?>