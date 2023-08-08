<?php
namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data['navbar'] = $this->view('static/navbar');

        $this->render('home/index', compact('data'));
    }
}