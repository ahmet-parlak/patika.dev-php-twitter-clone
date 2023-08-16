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
            $friendshipsModel = new Friendship();

            $friendship = $friendshipsModel->friendshipQuery($user);

        } catch (NotFoundException $e) {
            $this->render('errors/404');
        }

        if ($friendship) {
            switch ($friendship->status) {
                case 'pending':
                    if ($friendship->sender_user_id == auth('id')) {
                        $friendship = 'sent';
                    } else {
                        $friendship = 'received';
                    }
                    break;

                case 'accepted':
                    $friendship = 'friend';
                    break;

                case 'rejected':
                    $friendship = 'rejected';
                    break;
            }
        } else {
            $friendship = null;
        }

        if ($friendship == 'friend') {
            $tweets = $user->getTweets();
        } else {
            $tweets = [];
        }

        $this->render('user/index', compact('user', 'tweets', 'friendship'));
    }

    public function friendshipRequest($username)
    {
        $user = new User(username: $username); //if user not exist throws 404
        $friendshipsModel = new Friendship();

        $data = $this->request->post();

        /* If Cancel Friendship Request */
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


        /* Create Friendship Request */
        $friendship = $friendshipsModel->friendshipRequest($user);

        if ($friendship == true) {
            ResponseHelper::successResponse(message: 'Friendship request sent');
        } else {
            ResponseHelper::errorResponse();
        }
    }
}