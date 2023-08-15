<?php
namespace App\Controllers;


use App\Model\Auth;
use Core\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $this->render('profile/index');
    }

    public function updateUsername()
    {
        $data = $this->request->post();

        /* Validation */
        if ($this->request->required($data, array('username'))) {
            \ResponseHelper::errorResponse(message: 'Enter a username');
        }


        /* Username Control */
        $currentUsername = auth('username');
        $newUsername = $data['username'];

        if ($newUsername == $currentUsername) //if the current username is posted 
        {
            \ResponseHelper::errorResponse(message: 'You are already using this username');
        }

        if (preg_match('/^[a-zA-Z0-9_]+$/', $data['username']) == false) //username pattern check
        {
            \ResponseHelper::errorResponse(message: 'The user name can only consist of letters, numbers and underscores (_)');
        }

        if (strlen($data['username']) < 3) //length control
        {
            \ResponseHelper::errorResponse(message: 'Username must be at least 3 characters!');
        }

        $auth = new Auth(); //Create auth object for db and session operations
        if ($auth->isUsernameUnique($data['username']) == false) //is username unique
        {
            \ResponseHelper::errorResponse(message: 'This username is already taken!');
        }

        $isUpdated = $auth->updateUsername($newUsername);

        if ($isUpdated) {
            \ResponseHelper::successResponse(message: 'Username changed.', redirect: route('profile'));
        } else {
            \ResponseHelper::errorResponse(message: 'Somethins wrong. Please try again.');
        }
    }

    public function updateName()
    {
        $data = $this->request->post();

        /* Validation */
        if ($this->request->required($data, array('name'))) {
            \ResponseHelper::errorResponse(message: 'Please enter your name');
        }


        /* Name Control */
        $currentName = auth('name');
        $newName = $data['name'];

       


        $auth = new Auth(); //Create auth object for db and session operations
        if ($auth->isUsernameUnique($data['username']) == false) //is username unique
        {
            \ResponseHelper::errorResponse(message: 'This username is already taken!');
        }

        $isUpdated = $auth->updateUsername($newName);

        if ($isUpdated) {
            \ResponseHelper::successResponse(message: 'Username changed.', redirect: route('profile'));
        } else {
            \ResponseHelper::errorResponse(message: 'Somethins wrong. Please try again.');
        }
    }
}