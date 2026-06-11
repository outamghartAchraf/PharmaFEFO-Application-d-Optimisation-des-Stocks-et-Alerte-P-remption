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


        public static function getById(int $id): ?object
    {
        $stmt = self::getConnection()->prepare("
            SELECT *
            FROM batches
            WHERE id = ?
        ");

        $stmt->execute([$id]);

        $batch = $stmt->fetch(PDO::FETCH_OBJ);

        return $batch ?: null;
    }

     public static function create(
        int $productId,
        string $batchNumber,
        string $expirationDate,
        int $quantity
    ): bool {
        $stmt = self::getConnection()->prepare("
            INSERT INTO batches (
                product_id,
                batch_number,
                expiration_date,
                qty_received,
                qty_available,
                status
            )
            VALUES (?, ?, ?, ?, ?, 'ACTIVE')
        ");

        return $stmt->execute([
            $productId,
            $batchNumber,
            $expirationDate,
            $quantity,
            $quantity
        ]);
    }


    public static function update(
        int $id,
        int $productId,
        string $batchNumber,
        string $expirationDate,
        int $qtyReceived,
        int $qtyAvailable,
        string $status
    ): bool {
        $stmt = self::getConnection()->prepare("
            UPDATE batches
            SET
                product_id = ?,
                batch_number = ?,
                expiration_date = ?,
                qty_received = ?,
                qty_available = ?,
                status = ?
            WHERE id = ?
        ");

        return $stmt->execute([
            $productId,
            $batchNumber,
            $expirationDate,
            $qtyReceived,
            $qtyAvailable,
            $status,
            $id
        ]);
    }

}    