<?php
namespace App\Model;

use Core\Model;
use Core\Session;

class Auth extends Model
{


    public function login()
    {

    }

    public function register($data): bool
    {
        $values = [
            'username' => $data['username'],
            'name' => $data['name'],
            'password' => $this->passwordHash($data['username']),
        ];

        return $this->db->insert('users', $values);
    }

    public function isUsernameUnique($username): bool
    {
        $query = $this->db->pdo()->prepare("SELECT * From users WHERE username = :username");
        $query->execute(array('username' => $username));
        return $query->rowCount() > 0 ? false : true;
    }


    private function startSession($user)
    {
        Session::setSession('user', $user);
        Session::setSession('login', true);
    }

    private function passwordHash($password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }


    private function passwordVerify($password, $hashedPassword): bool
    {
        return password_verify($password, $hashedPassword);
    }

}