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

 
    public static function getExpiredReport(): array
    {
        $stmt = self::getConnection()->query("
            SELECT
                p.designation AS product_name,
                p.cip_code,
                b.batch_number,
                b.expiration_date,
                b.qty_available,
                b.status
            FROM batches b
            INNER JOIN products p
                ON p.id = b.product_id
            WHERE b.expiration_date < CURDATE()
            ORDER BY b.expiration_date ASC
        ");

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

 
    public static function getExpiringSoonReport(): array
    {
        $stmt = self::getConnection()->query("
            SELECT
                p.designation AS product_name,
                p.cip_code,
                b.batch_number,
                b.expiration_date,
                b.qty_available,
                DATEDIFF(
                    b.expiration_date,
                    CURDATE()
                ) AS days_remaining
            FROM batches b
            INNER JOIN products p
                ON p.id = b.product_id
            WHERE b.expiration_date BETWEEN CURDATE()
                AND DATE_ADD(CURDATE(), INTERVAL 90 DAY)
            ORDER BY b.expiration_date ASC
        ");

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


}