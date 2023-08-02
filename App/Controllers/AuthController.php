<?php
namespace App\Controllers;

use Core\Controller;

class AuthController extends Controller
{
    public function registerPage()
    {
        echo $this->view->load('auth/register');
    }

    public function register()
    {

    }

    public function loginPage()
    {
        echo $this->view->load('auth/login');
    }

    public function login()
    {

    }

    public function logout()
    {

    }

}