<?php
namespace Core;

class Request
{
    public function get()
    {
        return self::filter($_GET);
    }

    public function post()
    {
        return self::filter($_POST);

    }

    public static function filter($data)
    {
        return is_array($data) ? array_map('\Core\Request::filter', $data) : htmlspecialchars(trim($data));
    }

    function required(array $expectedKeys, array $data): bool
    {
        foreach ($expectedKeys as $key) {

            if (!isset($data[$key]) || strlen($data[$key]) == 0)
                return false;
        }

        return true;
    }
}