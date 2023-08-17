<?php
namespace App\Controllers;

use App\Model\Tweet;
use Core\Controller;
use ResponseHelper;

class HomeController extends Controller
{
    public function index()
    {
        $tweetModel = new Tweet();

        $friends = $tweetModel->getFriendsTweets();

        $this->render('home/index', compact('friends'));
    }

    public function friends()
    {
        $tweetModel = new Tweet();
        $friends = $tweetModel->getFriendsTweets();

        ResponseHelper::successResponse(data: $friends);
    }

    public function discover()
    {
        $tweetModel = new Tweet();
        $discover = $tweetModel->getAllTweets();

        ResponseHelper::successResponse(data: $discover);

    }
}