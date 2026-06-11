<?php

 require_once __DIR__ . "/../repository/BaseRepository.php";

class MedicalRepository extends BaseRepository
{
   
    public static function getAll(): array
    {
        $stmt = self::getConnection()->query("
            SELECT *
            FROM products
            ORDER BY id DESC
        ");

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

 
}