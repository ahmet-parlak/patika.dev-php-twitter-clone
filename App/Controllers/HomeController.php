<?php
namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        echo $this->view->load('home/index');
    }
}