<?php

namespace App\Models;
require_once 'app/Models/Model.php';
use App\Models\Model;

class User extends Model
{
    protected static $table = 'users';
    protected static $db = null;


    public static function create($data)
    {
        static::pdo();
        $query = "INSERT INTO " . static::$table ."(name,email,password,image)". " VALUES (:name, :email, :password , :image)";
        $st = static::$db->prepare($query);
        $st->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'image' => $data['image']
        ]);
        return $st->rowCount();
    }

    public static function update($data)
    {
        static::pdo();
        $query = "UPDATE " . static::$table . " SET name=:name, email=:email, password=:password, image=:image WHERE id=:id";
        $st = static::$db->prepare($query);
        $st->execute([
            'id' => $data['id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'image' => $data['image']
        ]);
           return $st->rowCount();
    }

}