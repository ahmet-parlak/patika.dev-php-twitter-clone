<?php
namespace App\Controllers;

use App\Model\Friendship;
use App\Model\Tweet;
use Core\Controller;
use ResponseHelper;

class FriendsController extends Controller
{
    public function index()
    {   
        $model = new Friendship();
        $friends = $model->getFriends();
        
        $this->render('friends/index', compact('friends'));
    }

    public function requests()
    {
        $model = new Friendship();
        $requests = $model->getRequests();
        
        $this->render('friends/requests', compact('requests'));
    }

    
}