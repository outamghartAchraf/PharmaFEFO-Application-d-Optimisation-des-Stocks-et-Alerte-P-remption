<?php

require_once __DIR__ . '/../Repository/BaseRepository.php';

class ReportRepository extends BaseRepository
{
 
    public static function getCurrentStockReport(): array
    {
        $stmt = self::getConnection()->query("
            SELECT
                p.designation AS product_name,
                p.cip_code,
                b.batch_number,
                b.expiration_date,
                b.qty_received,
                b.qty_available,
                b.status
            FROM batches b
            INNER JOIN products p
                ON p.id = b.product_id
            WHERE b.qty_available > 0
            ORDER BY p.designation ASC,
                     b.expiration_date ASC
        ");

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

 
   
}