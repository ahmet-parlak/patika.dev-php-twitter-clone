<?php
namespace App\Model;

use Core\Model;

class Friendship extends Model
{
    //table friendships
    public $sender_user_id;
    public $receiver_user_id;
    public $status;



    public function createRequest(User $user)
    {
        $friendship = $this->friendshipQuery($user);

        if (!$friendship) //if friendship not exists
        {
            return $this->db->insert("friendships", ['sender_user_id' => auth('id'), 'receiver_user_id' => $user->id]);
        } else {
            return false;
        }
    }

    public function cancelRequest(User $user)
    {
        $friendship = $this->friendshipQuery($user);
        if ($friendship) //if friendship is exists
        {
            return $this->db->delete("friendships", ['sender_user_id' => auth('id'), 'receiver_user_id' => $user->id]);
        } else {
            return false;
        }
    }

    public function acceptRequest(User $user)
    {
        $friendship = $this->receiverQuery($user);
        if ($friendship) //if friendship is exists
        {
            return $this->db->update("friendships", ['status' => 'accepted'], ['receiver_user_id' => auth('id'), 'sender_user_id' => $user->id]);
        } else {
            return false;
        }
    }

    public function rejectRequest(User $user)
    {
        $friendship = $this->receiverQuery($user);
        if ($friendship) //if friendship is exists
        {
            return $this->db->update("friendships", ['status' => 'rejected'], ['receiver_user_id' => auth('id'), 'sender_user_id' => $user->id]);
        } else {
            return false;
        }
    }

    public function unfriend(User $user)
    {
        $friendship = $this->friendQuery($user);
        if ($friendship) //if friendship is exists
        {
            return $this->db->delete("friendships", ['receiver_user_id' => auth('id'), 'sender_user_id' => $user->id]);
        } else {
            return false;
        }
    }


    public function friendshipQuery(User $user)
    {
        $q1 = "SELECT * FROM friendships WHERE sender_user_id = :auth_id AND receiver_user_id = :user_id";
        $q2 = "SELECT * FROM friendships WHERE sender_user_id = :user_id AND receiver_user_id = :auth_id";
        $q = $this->db->prepare("$q1 UNION $q2");
        $q->execute(['user_id' => $user->id, 'auth_id' => auth('id')]);

        return $q->fetchObject();
    }


    public function senderQuery(User $user)
    {
        $q = $this->db->prepare("SELECT * FROM friendships WHERE sender_user_id = :auth_id AND receiver_user_id = :user_id");
        $q->execute(['user_id' => $user->id, 'auth_id' => auth('id')]);

        return $q->fetchObject();
    }

    public function receiverQuery(User $user)
    {
        $q = $this->db->prepare("SELECT * FROM friendships WHERE sender_user_id = :user_id AND receiver_user_id = :auth_id");
        $q->execute(['user_id' => $user->id, 'auth_id' => auth('id')]);

        return $q->fetchObject();
    }
    public function friendQuery(User $user)
    {
        $q1 = "SELECT * FROM friendships WHERE sender_user_id = :auth_id AND receiver_user_id = :user_id AND status = 'accepted'";
        $q2 = "SELECT * FROM friendships WHERE sender_user_id = :user_id AND receiver_user_id = :auth_id AND status = 'accepted'";
        $q = $this->db->prepare("$q1 UNION $q2");
        $q->execute(['user_id' => $user->id, 'auth_id' => auth('id')]);

        return $q->fetchObject();
    }

    public function getFriends(bool $getSQL = false)
    {
        $q1 = "SELECT receiver_user_id as user_id, updated_date as friendship_date FROM friendships WHERE sender_user_id = :auth_id AND status = 'accepted'";
        $q2 = "SELECT sender_user_id as user_id, updated_date as friendship_date FROM friendships WHERE receiver_user_id = :auth_id AND status = 'accepted'";

        $q = "SELECT f.user_id, f.friendship_date, u.username, u.name, u.photo_url, u.created_date FROM ($q1 UNION $q2) f JOIN users u ON u.id = f.user_id";

        if ($getSQL) //if query is requested
            return $q;

        $q = $this->db->prepare($q);
        $q->execute(['auth_id' => auth('id')]);

        return $q->fetchObject();
    }
}