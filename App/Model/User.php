<?php
namespace App\Model;

use Core\Model;

class User extends Model
{
    public $username;
    public $name;
    public $password;
    public $photo_url;
    public $about;

    public function __construct($data = null, $username = null)
    {
        parent::__construct();
        $this->table = 'users';

        if ($data != null) {
            $this->id = $data['id'];
            $this->username = $data['username'];
            $this->password = $data['password'] ?? null;
            $this->name = $data['name'];
            $this->photo_url = $data['photo_url'];
            $this->about = $data['about'];
            $this->updated_date = $data['updated_date'];
            $this->created_date = $data['created_date'];
        } elseif ($username != null) {
            $this->username = $username;
            $user = $this->getUserWithUsername();

            if ($user) {
                $this->id = $user['id'];
                $this->username = $user['username'];
                $this->name = $user['name'];
                $this->photo_url = $user['photo_url'];
                $this->about = $user['about'];
                $this->created_date = $user['created_date'];
            } else {
                throw new \App\Exceptions\NotFoundException();
            }
        }
    }


    protected function getUserWithUsername()
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE username = :username");
        $stmt->execute(['username' => $this->username]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $user ?? false;
    }

    public function getTweets()
    {
        $stmt = $this->db->prepare("SELECT content, created_at as date  FROM tweets WHERE user_id = $this->id");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

}