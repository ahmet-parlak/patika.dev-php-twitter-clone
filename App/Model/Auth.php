<?php
namespace App\Model;

use Core\Model;
use Core\Session;

class Auth extends Model
{


    public function login($data): bool
    {
        $username = $data['username'];
        $password = $data['password'];

        $stmt = $this->db->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->execute(['username' => $username]);

        $userData = $stmt->fetch(\PDO::FETCH_ASSOC);
        $hash = $userData['password'] ?? '';


        if ($userData && $this->passwordVerify($password, $hash)) //if user exist and password correct 
        {

            $user = new User($userData);

            $this->startSession($user);
            return true;
        }

        return false;
    }

    public function register($data): bool
    {
        $values = [
            'username' => $data['username'],
            'name' => $data['name'],
            'password' => $this->passwordHash($data['password']),
        ];

        $id = $this->db->insert('users', $values, true); //insert user and get last insert id


        if ($id) {
            $data = $this->db->fetchWithId('users', $id); //get user data

            $user = new User($data);

            $this->startSession($user);

            return true;
        }

        return false;
    }

    public function isUsernameUnique($username): bool
    {
        $query = $this->db->prepare("SELECT * From users WHERE username = :username");
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


    private function passwordVerify(string $password, string $hashedPassword): bool
    {
        return password_verify($password, $hashedPassword);
    }

}