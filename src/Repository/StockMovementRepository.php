<?php

require_once __DIR__ . '/../Repository/BaseRepository.php';

class StockMovementRepository extends BaseRepository
{

    public static function getAll(): array
    {
        $stmt = self::getConnection()->query("
            SELECT 
                sm.*,
                b.batch_number
            FROM stock_movements sm
            LEFT JOIN batches b ON sm.batch_id = b.id
            ORDER BY sm.movement_date DESC
        ");

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

 
}
