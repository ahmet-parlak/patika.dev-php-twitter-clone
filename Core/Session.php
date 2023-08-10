<?php
namespace Core;

class Session
{
    public static function getSession($name)
    {
        return $_SESSION[$name] ?? false;
    }

    public static function setSession($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public static function removeSession()
    {
        session_destroy();
    }

    public static function auth(): \App\Model\User|false
    {
        $user = self::getSession('user');

        if ($user == false) {
            return false;
        } else {
            return unserialize($user);
        }
    }
}