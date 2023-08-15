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
        if (!$this->request->required(array('username'), $data)) {
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
        if (!$this->request->required(array('name'), $data)) {
            \ResponseHelper::errorResponse(message: 'Please enter your name');
        }

        if (strlen($data['name']) < 3) //length control
        {
            \ResponseHelper::errorResponse(message: 'Name must be at least 3 characters!');
        }

        /* Name Control */
        $currentName = auth('name');
        $newName = $data['name'];

        if ($newName == $currentName) //if the current username is posted 
        {
            \ResponseHelper::errorResponse(message: 'You are already using this name');
        }

        $auth = new Auth(); //Create auth object for db and session operations

        $isUpdated = $auth->updateName($newName);

        if ($isUpdated) {
            \ResponseHelper::successResponse(message: 'Name changed.', redirect: route('profile'));
        } else {
            \ResponseHelper::errorResponse(message: 'Somethins wrong. Please try again.');
        }
    }

    public function updateAbout()
    {
        $data = $this->request->post();

        /* Validation */
        if (!isset($data['about'])) {
            \ResponseHelper::errorResponse(message: 'Somethings wrong. Please refresh the page!');
        }

        if (strlen($data['about']) > 150) //length control
        {
            \ResponseHelper::errorResponse(message: 'The About section can consist of a maximum of 150 characters.');
        }

        /* About Control */
        $currentAbout = auth('about');
        $newAbout = $data['about'];

        if ($newAbout == $currentAbout) //if the current username is posted 
        {
            \ResponseHelper::errorResponse(message: 'No change');
        }

        $auth = new Auth(); //Create auth object for db and session operations

        $isUpdated = $auth->updateAbout($newAbout);

        if ($isUpdated) {
            \ResponseHelper::successResponse(message: 'About section updated', redirect: route('profile'));
        } else {
            \ResponseHelper::errorResponse(message: 'Somethins wrong. Please try again.');
        }
    }


    public function updatePassword()
    {
        $data = $this->request->post();
        $expected = ['current_password', 'new_password', 'confirm_new_password'];

        /* Validation */
        if (!$this->request->required($expected, $data)) {
            \ResponseHelper::errorResponse(message: 'Please enter all fields!');
        }

        if (strlen($data['new_password']) < 6) //length control
        {
            \ResponseHelper::errorResponse(message: 'New password must be at least 6 characters!');
        }

        $currentPassword = $data['current_password'];
        $newPassword = $data['new_password'];
        $confirmPassword = $data['confirm_new_password'];

        if ($newPassword != $confirmPassword) {
            \ResponseHelper::errorResponse(message: 'Passwords do not match!');
        }

        /* Password Control */
        $auth = new Auth(); //Create auth object for db and session operations

        if (!$auth->passwordVerify($currentPassword, auth('password'))) //if the current password is wrong 
        {
            \ResponseHelper::errorResponse(message: 'You entered your current password incorrectly!');
        }



        $isUpdated = $auth->updatePassword($newPassword);

        if ($isUpdated) {
            \ResponseHelper::successResponse(message: 'Password updated.');
        } else {
            \ResponseHelper::errorResponse(message: 'Somethins wrong. Please try again.');
        }
    }

    public function updatePhoto()
    {
        \ResponseHelper::errorResponse(message: 'This feature is still in the development stage.');
    }


}