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

    public static function getById(int $id): ?object
    {
        $stmt = self::getConnection()->prepare("
            SELECT *
            FROM products
            WHERE id = ?
        ");

        $stmt->execute([$id]);

        $product = $stmt->fetch(PDO::FETCH_OBJ);

        return $product ?: null;
    }

 
}