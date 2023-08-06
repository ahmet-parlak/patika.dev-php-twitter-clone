<?php
namespace Core;

class Database
{
    private $db;

    public function __construct()
    {
        try {
            $host = HOST;
            $dbname = DB;
            $username = DB_USERNAME;
            $password = DB_PASSWORD;

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


    public function fetch($sql): array
    {
        return $this->db->query($sql, \PDO::FETCH_ASSOC)->fetch() ?? [];
    }

    public function fetchAll($sql): array
    {
        return $this->db->query($sql, \PDO::FETCH_ASSOC)->fetchAll() ?? [];
    }


    public function insert($table, $values): bool
    {
        try {
            $columns = implode(", ", array_keys($values));

            $vals = ':' . implode(", :", array_keys($values));

            $stmt = $this->db->prepare("INSERT INTO $table ($columns) VALUES ($vals)");

            $stmt->execute($values);

            return true;

        } catch (\PDOException $e) {
            return false;
        }
    }


    public function update($table, $values, $keys): bool
    {
        try {
            $setClause = '';
            foreach ($values as $column => $value) {
                $setClause .= "$column = :$column, ";
            }
            $setClause = rtrim($setClause, ', '); // Remove trailing comma and space

            $whereClause = '';
            foreach ($keys as $whereColumn => $whereValue) {
                $whereClause .= "$whereColumn = :where_$whereColumn AND ";
            }
            $whereClause = rtrim($whereClause, ' AND '); // Remove trailing "AND"

            $sql = $this->db->prepare("UPDATE $table SET $setClause WHERE $whereClause");

            $parameters = array();
            foreach ($values as $column => $value) {
                $parameters[":$column"] = $value;
            }
            foreach ($keys as $whereColumn => $whereValue) {
                $parameters[":where_$whereColumn"] = $whereValue;
            }

            $sql->execute($parameters);

            return true;

        } catch (\PDOException $e) {
            return false;
        }
    }

    public function delete($table, $keys): bool
    {
        try {
            $whereClause = '';
            foreach ($keys as $column => $value) {
                $whereClause .= "$column = :$column AND ";
            }
            $whereClause = rtrim($whereClause, ' AND '); // Remove trailing "AND"

            $sql = $this->db->prepare("DELETE FROM $table WHERE $whereClause");

            $parameters = array();
            foreach ($keys as $column => $value) {
                $parameters[":$column"] = $value;
            }

            $sql->execute($parameters);

            return true;

        } catch (\PDOException $e) {
            return false;
        }
    }

}