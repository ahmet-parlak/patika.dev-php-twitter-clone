<?php
namespace App\Controllers;

use App\Exceptions\NotFoundException;
use App\Model\Friendship;
use App\Model\User;
use Core\Controller;
use ResponseHelper;

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

    public function friendshipRequest($username)
    {
        $user = new User(username: $username); //if user not exist throws 404

        $friendshipsModel = new Friendship();

        $friendship = $friendshipsModel->friendshipRequest($user);

        if ($friendship == true) {
            ResponseHelper::successResponse(message:'Friendship request sent');
        }else{
            ResponseHelper::errorResponse();
        }
    }
}