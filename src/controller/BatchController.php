<?php
require_once __DIR__ . "/../repository/BaseRepository.php";

class BatchRepository extends BaseRepository
{


    public static function getAll(): array
    {
        $stmt = self::getConnection()->query("
            SELECT
                b.*,
                p.designation AS product_name,
                p.cip_code
            FROM batches b
            INNER JOIN products p
                ON b.product_id = p.id
            ORDER BY b.expiration_date ASC
        ");

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


}    