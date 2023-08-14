<?php
namespace App\Controllers;

use App\Exceptions\NotFoundException;
use App\Model\User;
use Core\Controller;

class UserController extends Controller
{
    public function index($username)
    {

        try {
            $user = new User(username: $username);
        } catch (NotFoundException $e) {
            $this->render('errors/404');
        }

        $tweets = $user->getTweets();

        $this->render('user/index', compact('user', 'tweets'));
    }
}