<?php
namespace App\Controllers;

use App\Model\Auth;
use Core\Controller;
use ResponseHelper;

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
        if (!$this->request->required(['username', 'name', 'password', 'confirm_password'], $data)) //Expected data
        {
            ResponseHelper::errorResponse(message: 'Please enter all fields!');
        }

        $minUsernameLen = MIN_USERNAME_LENGTH;
        $minNameLen = MIN_NAME_LENGTH;
        $minPasswordLen = MIN_PASSWORD_LENGTH;

        if (strlen($data['username']) < $minUsernameLen) //username length control
        {
            ResponseHelper::errorResponse(message: "Username and name must be at least $minUsernameLen characters!");
        }

        if (strlen($data['name']) < $minNameLen) //name length control
        {
            ResponseHelper::errorResponse(message: "Username and name must be at least $minNameLen characters!");
        }

        if (strlen($data['password']) < $minPasswordLen) //password length control
        {
            ResponseHelper::errorResponse(message: "Password must be at least $minPasswordLen characters!");
        }

        if ($data['password'] != $data['confirm_password']) //do passwords match
        {
            ResponseHelper::errorResponse(message: 'Passwords do not match!');
        }

        if (preg_match('/^[a-zA-Z0-9_]+$/', $data['username']) == false) //username pattern check
        {
            ResponseHelper::errorResponse(message: 'The user name can only consist of letters, numbers and underscores (_).');
        }


        /* Registration */
        $auth = new Auth(); //Create auth object for db and session operations

        if ($auth->isUsernameUnique($data['username']) == false) //is username unique
        {
            ResponseHelper::errorResponse(message: 'This username is already taken!');
        }

        $status = $auth->register($data); //register data : bool

        if ($status) //register control
        {
            ResponseHelper::successResponse(message: 'You have successfully registered', redirect: route());
        } else {
            ResponseHelper::errorResponse(message: 'An unexpected error occurred. Please try again');
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
            ResponseHelper::warningResponse(message: 'Please enter username and password.');
        }

        /* Login */
        $auth = new Auth(); //Create auth object for db and session operations

        $status = $auth->login($data); //login user : bool

        if ($status) //login control
        {
            ResponseHelper::successResponse(message: 'Login successful', redirect: route());
        } else {
            ResponseHelper::errorResponse(message: 'Username and password do not match!');
        }
    }

    public function logout()
    {
        \Core\Session::removeSession();
        ResponseHelper::successResponse(message: 'Logout successful', redirect: route('login'));
    }

}