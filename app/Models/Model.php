<?php

namespace App\Models;

require_once 'app/Config.php';
use PDO;
use PDOException;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class Model
{
    protected static $db = null;
    protected static $table = '';

    public static function pdo()
    {
        if (static::$db == null) {
            $dsn = "mysql:dbname=".DB_NAME.";host=".DB_HOST.";port=".DB_PORT.";";
            try {
                static::$db = new PDO($dsn, DB_USER, DB_PASS);
                static::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                static::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }

        }

    }


    public static function all()
    {
        static::pdo();
        //prepare query
        $query = "SELECT * FROM " . static::$table;
        $st = static::$db->prepare($query);
        $st->execute();
        return $st->fetchAll();
    }

    public static function find($id)
    {
        static::pdo();
        $query = "SELECT * FROM " . static::$table . " WHERE id=:id";
        $st = static::$db->prepare($query);
        $st->execute(['id' => $id]);
        return $st->fetch();

    }

    // should be implemented in child class
    public static function create($data)
    {
        static::pdo();
        $query = "INSERT INTO " . static::$table ."(name,email,password)". " VALUES (:name, :email, :password)";
        $st = static::$db->prepare($query);
        $st->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
        return $st->rowCount();

    }

    // should be implemented in child class
    public static function update($data)
    {
        static::pdo();
        $query = "UPDATE " . static::$table . " SET name=:name, email=:email, password=:password WHERE id=:id";
        $st = static::$db->prepare($query);
        $st->execute([
            'id' => $data['id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
        return $st->rowCount();
    }

    public static function delete($id)
    {
        static::pdo();
        $query = "DELETE FROM " . static::$table . " WHERE id=:id";
        $st = static::$db->prepare($query);
        $st->execute(['id' => $id]);
        return $st->rowCount();
    }

    public static function where($column, $value)
    {
        static::pdo();
        $query = "SELECT * FROM " . static::$table . " WHERE " . $column . "=:value";
        $st = static::$db->prepare($query);
        $st->execute(['value'=> $value]);
        return $st->fetchAll();
    }

    public static function whereMultiple($conditions)
    {
        static::pdo();
        $query = "SELECT * FROM " . static::$table . " WHERE ";
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i == 0) {
                $query .= $key . "='" . $value . "'";
            } else {
                $query .= " AND " . $key . "='" . $value . "'";
            }
            $i++;
        }
        $st = static::$db->prepare($query);
        $st->execute();
        return $st->fetchAll();
    }

    public static function updateSingle($id, $column, $value)
    {
        static::pdo();
        $query = "UPDATE " . static::$table . " SET " . $column . "=:value WHERE id=:id";
        $st = static::$db->prepare($query);
        $st->execute([
            'id' => $id,
            'value' => $value
        ]);
        return $st->rowCount();
    }




}