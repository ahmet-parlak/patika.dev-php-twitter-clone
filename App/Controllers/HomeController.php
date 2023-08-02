<?php
namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data['navbar'] = $this->view->load('static/navbar');
        
        echo $this->view->load('home/index', compact('data'));
    }
}