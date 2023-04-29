<?php

namespace App\Models;
require_once 'app/Models/Model.php';
use App\Models\Model;

class Category extends Model
{
    protected static $table = 'categories';
    protected static $db = null;


    public static function create($data)
    {
        static::pdo();
        $query = "INSERT INTO " . static::$table ."(name)". " VALUES (:name)";
        $st = static::$db->prepare($query);
        $st->execute([
            'name' => $data['name']]);
        return $st->rowCount();
    }

    public static function update($data)
    {
    }

}