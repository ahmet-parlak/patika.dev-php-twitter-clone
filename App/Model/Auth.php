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

        $userData = $stmt->fetch(\PDO::FETCH_OBJ);

        $hash = $userData->password ?? '';


        if ($userData && $this->passwordVerify($password, $hash)) //if user exist and password correct 
        {
            $this->startSession($userData);
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
            $user = $this->db->fetchWithId('users', $id, fetchMode: \PDO::FETCH_OBJ); //get user data

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
        Session::setSession('user', serialize($user));
        Session::setSession('login', true);
    }
    private function refreshSession()
    {
        $userid = auth('id');
        $q = $this->db->prepare('SELECT * FROM users where id = :id');
        $q->execute(['id' => $userid]);
        $user = $q->fetchObject();
        Session::setSession('user', serialize($user));
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


    public function updateUsername($username): bool
    {
        try {
            $id = auth('id');
            $query = $this->db->prepare("UPDATE users SET username = :username WHERE id = $id");
            $query->execute(array('username' => $username));


            if ($query->rowCount() > 0) {

                $this->refreshSession();

                return true;
            } else {
                return false;
            }

        } catch (\Throwable $th) {
            print_r($th);
            return false;
        }
    }

    public function updateName($name): bool
    {
        try {
            $id = auth('id');
            $query = $this->db->prepare("UPDATE users SET name = :name WHERE id = $id");
            $query->execute(array('name' => $name));

            if ($query->rowCount() > 0) {

                $this->refreshSession();

                return true;
            } else {
                return false;
            }

        } catch (\Throwable $th) {
            print_r($th);
            return false;
        }
    }
    public function updateAbout($about): bool
    {
        try {
            $id = auth('id');
            $query = $this->db->prepare("UPDATE users SET about = :about WHERE id = $id");
            $query->execute(array('about' => $about));

            if ($query->rowCount() > 0) {

                $this->refreshSession();

                return true;
            } else {
                return false;
            }

        } catch (\Throwable $th) {
            print_r($th);
            return false;
        }
    }

}