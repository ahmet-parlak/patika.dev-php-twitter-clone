<?php
namespace App\Controllers;

use Core\Controller;


class ErrorController extends Controller
{

    public function _404()
    {
        $this->render('errors/404');
    }



}