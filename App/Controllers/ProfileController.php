<?php
namespace App\Controllers;


use Core\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        
        $this->render('profile/index');
    }
}