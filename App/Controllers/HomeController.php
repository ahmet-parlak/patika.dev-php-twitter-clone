<?php
namespace App\Controllers;

use App\Model\Tweet;
use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $tweetModel = new Tweet();
        //$discover = $tweetModel->getAllTweets();
        $friends = $tweetModel->getFriendsTweets();
        
        $this->render('home/index', compact('friends')); 
    }
}