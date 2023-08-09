<?php
namespace App\Controllers;

use App\Model\Auth;
use Core\Controller;
use Core\Request;

class AuthController extends Controller
{

    public function registerPage()
    {
        $this->render('auth/register');
    }

    public function register()
    {

        $data = $this->request->post(); //Get posted data

        /* Validation */
        if (!$this->request->required(['username', 'password', 'confirm_password'], $data)) //Expected data
        {
            errorResponse(message: 'Please enter all fields');
        }

        if (strlen($data['username']) < 3 || strlen($data['name']) < 3) //length control
        {
            errorResponse(message: 'Username and name must be at least 3 characters.');
        }

        if (strlen($data['password']) < 6) //password length control
        {
            errorResponse(message: 'Password must be at least 6 characters.');
        }

        if ($data['password'] != $data['confirm_password']) //do passwords match
        {
            errorResponse(message: 'Passwords do not match!');
        }

        if (preg_match('/^[a-zA-Z0-9_]+$/', $data['username']) == false) //username pattern check
        {
            errorResponse(message: 'The user name can only consist of letters, numbers and underscores (_).');
        }


        /* Registration */
        $auth = new Auth(); //Create auth object for db and session operations

        if ($auth->isUsernameUnique($data['username']) == false) //is username unique
        {
            errorResponse(message: 'This username is already taken');
        }

        $status = $auth->register($data); //register data : bool

        if ($status) //register control
        {
            successResponse(message: 'You have registered. You will be redirected to the home page...');
        } else {
            errorResponse(message: 'An unexpected error occurred. Please try again');
        }

    }

    public function loginPage()
    {
        $this->render('auth/login');
    }

    public function login()
    {
        $data = $this->request->post(); //Get posted data

        /* Validation */
        if (!$this->request->required(['username', 'password'], $data)) //Expected data
        {
            warningResponse(message: 'Please enter username and password.');
        }

        /* Login */
        $auth = new Auth(); //Create auth object for db and session operations

        $status = $auth->login($data); //login user : bool

        if ($status) //login control
        {
            successResponse(message: 'Login successful. You are redirected to the home page...', redirect:route());
        } else {
            errorResponse(message: 'Username and password do not match.');
        }
    }

    public function logout()
    {
        \Core\Session::removeSession();
        successResponse(message: 'Logout successful.');
    }

}