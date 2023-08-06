<?php
namespace App\Controllers;

use App\Model\Auth;
use Core\Controller;

class AuthController extends Controller
{
    public function registerPage()
    {
        echo $this->view->load('auth/register');
    }

    public function register()
    {
        $data = $this->request->post();

        if (!($data['username'] ?? null) || !($data['password'] ?? null) || !($data['confirm_password'] ?? null) || !($data['name'] ?? null)) {
            $status = 'error';
            $title = 'Ops! Attention!';
            $message = 'Please enter all fields';
            echo json_encode(['status' => $status, 'title' => $title, 'message' => $message]);
            exit();
        }

        if (strlen($data['username']) < 3 || strlen($data['name']) < 3) {
            $status = 'error';
            $title = 'Ops! Attention!';
            $message = 'Username and name must be at least 3 characters.';
            echo json_encode(['status' => $status, 'title' => $title, 'message' => $message]);
            exit();
        }

        if (strlen($data['password']) < 6) {
            $status = 'error';
            $title = 'Ops! Attention!';
            $message = 'Password must be at least 6 characters.';
            echo json_encode(['status' => $status, 'title' => $title, 'message' => $message]);
            exit();
        }

        if (preg_match('/^[a-zA-Z0-9_]+$/', $data['username']) == false) {
            $status = 'error';
            $title = 'Ops! Attention!';
            $message = 'The user name can only consist of letters, numbers and underscores (_).';
            echo json_encode(['status' => $status, 'title' => $title, 'message' => $message]);
            exit();
        }


        $auth = new Auth();

        if ($auth->isUsernameUnique($data['username']) == false) {
            $status = 'error';
            $title = 'Ops! Attention!';
            $message = 'This username is already taken';
            echo json_encode(['status' => $status, 'title' => $title, 'message' => $message]);
            exit();
        }

        if ($data['password'] != $data['confirm_password']) {
            $status = 'error';
            $title = 'Ops! Attention!';
            $message = 'Passwords do not match!';
            echo json_encode(['status' => $status, 'title' => $title, 'message' => $message]);
            exit();
        }


        $staus = $auth->register($data);

        if ($staus) {
            $status = 'success';
            $title = 'Successful';
            $message = 'You have registered. You will be redirected to the home page...';
            echo json_encode(['status' => $status, 'title' => $title, 'message' => $message]);
            exit();
        } else {
            $status = 'error';
            $title = 'Ops! Attention!';
            $message = 'An unexpected error occurred. Please try again';
            echo json_encode(['status' => $status, 'title' => $title, 'message' => $message]);
            exit();
        }

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