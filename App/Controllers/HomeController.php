<?php
namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data['navbar'] = $this->view('static/navbar');

        echo $this->view('home/index', compact('data'));
    }
}