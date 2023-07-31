<?php
namespace Core;

class Database
{
    private $db;

    public function __construct()
    {

        try {
            $host = 'localhost';
            $dbname = 'patika_twitter_clone';
            $username = 'root';
            $password = '';

            $this->db = new \PDO("mysql:host=$host;dbname=$dbname", "$username", "$password");
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $this->db->query('SET @@lc_time_names = "tr_TR";'); //Turkish time names
            $this->db->query('SET CHARACTER_SET_CONNECTION=utf8mb4');

        } catch (\PDOException $e) {
            echo "<hr>";
            print_r($e->getMessage());
            echo "<hr>";

        }
    }



    public function query($sql, $fetchAll = false): array
    {
        if ($fetchAll == false) {
            return $this->db->query($sql, \PDO::FETCH_ASSOC)->fetch() ?? [];
        } else {
            return $this->db->query($sql, \PDO::FETCH_ASSOC)->fetchAll() ?? [];
        }
    }

}