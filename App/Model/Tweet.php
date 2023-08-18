<?php
namespace App\Model;

use Core\Database;
use Core\Model;

class Tweet extends Model
{
    public $content;

    public $user_id;

    public function __construct(string $content = null, int $user_id = null)
    {
        parent::__construct();
        $this->table = 'tweets';
        $this->content = $content;
        $this->user_id = $user_id ?? auth('id');
    }

    public function create()
    {
        $values = ['user_id' => $this->user_id, 'content' => $this->content];
        $createdId = $this->db->insert($this->table, $values, true);
        if ($createdId) {
            return $this->fetchWithUser($createdId);
        } else {
            return false;
        }
    }


    public function fetchWithUser($id)
    {
        $stmt = $this->db->prepare("SELECT t.content, t.created_at, u.username, u.name, u.photo_url FROM tweets t JOIN users u ON t.user_id = u.id WHERE t.id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }


    public function getAllTweets()
    {
        $stmt = "SELECT t.content, t.created_at as date, u.name, u.username, u.photo_url FROM tweets t JOIN users u ON u.id = t.user_id ORDER BY t.created_at DESC";
        return $this->db->fetchAll($stmt, \PDO::FETCH_OBJ);
    }

    public function getFriendsTweets()
    {
        $friendshipModel = new Friendship();

        $friendsQuery = $friendshipModel->getFriends(getSQL: true);
        $friendsTweetsQ = "SELECT friends.username, friends.name, t.content, t.created_at as date FROM ($friendsQuery) friends JOIN tweets t on friends.user_id = t.user_id";

        $userTweetsQ = "SELECT user.username, user.name, twt.content, twt.created_at as date FROM users user JOIN tweets twt on user.id = twt.user_id";

        $stmt = $this->db->prepare("SELECT * FROM ($friendsTweetsQ UNION $userTweetsQ) twts ORDER BY twts.date DESC");
        $stmt->execute(['auth_id' => auth('id')]);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}