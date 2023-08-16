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

        $data = $this->request->post();

        if (isset($data['cancel_request']) && $data['cancel_request'] == 'true') {
            $friendship = $friendshipsModel->friendshipQuery($user);

            if ($friendship) {
                $friendshipsModel->cancelFriendshipRequest($user) ?
                    ResponseHelper::successResponse(message: 'Request cancelled.') :
                    ResponseHelper::errorResponse();
            } else {

                ResponseHelper::errorResponse();
            }
        }



        $friendship = $friendshipsModel->friendshipRequest($user);

        if ($friendship == true) {
            ResponseHelper::successResponse(message: 'Friendship request sent');
        } else {
            ResponseHelper::errorResponse();
        }
    }
}