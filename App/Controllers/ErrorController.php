<?php
namespace App\Controllers;

use Core\Controller;


class ErrorController extends Controller
{

    public function _404()
    {
        header('HTTP/1.1 404 Not Found');
        $this->render('errors/404');
    }



}