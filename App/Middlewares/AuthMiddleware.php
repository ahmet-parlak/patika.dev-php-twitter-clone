<?php
namespace App\Middlewares;

use Core\Middleware;
use Core\Session;

class AuthMiddleware extends Middleware
{
    public function isLogin()
    {
        $isLogin = Session::getSession('login');

        if (!$isLogin) //is login false
        {
            Session::removeSession();
            redirect('login');
        }
    }
}