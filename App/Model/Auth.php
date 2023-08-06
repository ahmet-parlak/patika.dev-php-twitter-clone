<?php
namespace App\Model;

use Core\Model;
use Core\Session;

class Auth extends Model
{


    public function login()
    {

    }

    public function register()
    {

    }


    private function startSession($user)
    {
        Session::setSession('user', $user);
        Session::setSession('login', true);
    }

    private function passwordHash($password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }


    private function passwordVerify($password, $hashedPassword): bool
    {
        return password_verify($password, $hashedPassword);
    }

}