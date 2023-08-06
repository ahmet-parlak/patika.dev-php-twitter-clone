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

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->username = $data['username'];
        $this->password = $data['password'] ?? null;
        $this->name = $data['name'];
        $this->photo_url = $data['photo_url'];
        $this->about = $data['about'];
        $this->updated_date = $data['updated_date'];
        $this->created_date = $data['created_date'];
    }

}