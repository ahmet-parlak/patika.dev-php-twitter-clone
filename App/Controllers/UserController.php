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

        /* If Update Friendship Request */
        if (isset($data['request'])) {
            $request = $data['request'];

            switch ($request) {
                case 'cancel':
                    $friendshipsModel->cancelRequest($user) ?
                        ResponseHelper::successResponse(message: 'Request cancelled') :
                        ResponseHelper::errorResponse();
                    break;

                case 'accept':
                    $friendshipsModel->acceptRequest($user) ?
                        ResponseHelper::successResponse(message: 'Request accepted', redirect: route("user/{$user->username}")) :
                        ResponseHelper::errorResponse();
                    break;

                case 'reject':
                    $friendshipsModel->rejectRequest($user) ?
                        ResponseHelper::successResponse(message: 'Request rejected', redirect: route("user/{$user->username}")) :
                        ResponseHelper::errorResponse();
                    break;

                case 'unfriend':
                    $friendshipsModel->unfriend($user) ?
                        ResponseHelper::successResponse(message: 'Unfriended', redirect: route("user/{$user->username}")) :
                        ResponseHelper::errorResponse();
                    break;

                case 'remove':
                    $friendshipsModel->removeRequest($user) ?
                        ResponseHelper::successResponse(message: 'Request removed', redirect: route("user/{$user->username}")) :
                        ResponseHelper::errorResponse();
                    break;

                default:
                    ResponseHelper::errorResponse();
                    break;
            }
        }


        /* Create Friendship Request */
        $friendship = $friendshipsModel->createRequest($user);

        if ($friendship == true) {
            ResponseHelper::successResponse(message: 'Friendship request sent');
        } else {
            ResponseHelper::errorResponse();
        }
    }
}