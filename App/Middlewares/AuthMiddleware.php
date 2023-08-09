<?php
namespace App\Middlewares;

use Core\Middleware;
use Core\Session;

class AuthMiddleware extends Middleware
{
    public function auth()
    {
        $isLogin = Session::getSession('login');

        if (!$isLogin) //is not authenticated
        {
            Session::removeSession();
            redirect('login');
        }
    }
    public function notAuth()
    {
        $isLogin = Session::getSession('login');

        if ($isLogin) //is authenticated
        {
            redirect('');
        }
    }
}