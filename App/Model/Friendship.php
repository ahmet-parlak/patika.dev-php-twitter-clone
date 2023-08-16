<?php
namespace App\Model;

use Core\Model;

class Friendship extends Model
{
    //table friendships
    public $sender_user_id;
    public $reciever_user_id;
    public $status;



    public function friendshipRequest(User $user)
    {
        $friendship = $this->friendshipQuery($user);

        if (!$friendship) //if friendship not exists
        {
            return $this->db->insert("friendships", ['sender_user_id' => auth('id'), 'reciever_user_id' => $user->id]);
        } else {
            return false;
        }
    }

    public function cancelFriendshipRequest(User $user)
    {
        $friendship = $this->friendshipQuery($user);
        if ($friendship) //if friendship is exists
        {
            return $this->db->delete("friendships", ['sender_user_id' => auth('id'), 'reciever_user_id' => $user->id]);
        } else {
            return false;
        }
    }


    public function friendshipQuery(User $user)
    {
        $q1 = "SELECT * FROM friendships WHERE sender_user_id = :auth_id AND reciever_user_id = :user_id";
        $q2 = "SELECT * FROM friendships WHERE sender_user_id = :user_id AND reciever_user_id = :auth_id";
        $q = $this->db->prepare("$q1 UNION $q2");
        $q->execute(['user_id' => $user->id, 'auth_id' => auth('id')]);

        return $q->fetchObject();
    }
}