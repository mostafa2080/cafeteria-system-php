<?php

namespace App\Models;
require_once 'app/Models/Model.php';
use App\Models\Model;

class Product extends Model
{
    protected static $table = 'products';
    protected static $db = null;


    public static function create($data)
    {
        static::pdo();
        $query = "INSERT INTO " . static::$table . "(name, image, price, status, categoryID) VALUES (:name, :image, :price, :status, :categoryID)";
        $st = static::$db->prepare($query);
        $st->execute([
            'name' => $data['name'],
            'image' => $data['image'],
            'price' => $data['price'],
            'status' => $data['status'],
            'categoryID' => $data['categoryID'],
        ]);
        return $st->rowCount();
    }
    
    
    public static function update($data)
{
    static::pdo();

    // Map the string value of status to the appropriate integer value
    $status = ($data['status'] == 'available') ? 1 : 0;

    $query = "UPDATE " . static::$table . " SET name = :name, image = :image, price = :price, status = :status, categoryID = :categoryID WHERE id = :id";
    $st = static::$db->prepare($query);
    $st->execute([
        'name' => $data['name'],
        'image' => $data['image'],
        'price' => $data['price'],
        'status' => $status,
        'categoryID' => $data['categoryID'],
        'id' => $data['id']
    ]);
    return $st->rowCount();
}

}