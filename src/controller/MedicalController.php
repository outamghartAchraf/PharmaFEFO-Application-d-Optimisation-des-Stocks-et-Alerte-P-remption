<?php


include_once __DIR__ . "/../Repository/MedicalRepository.php";
include_once __DIR__ . "/../Repository/BatchRepository.php";
include_once __DIR__ . "/../Repository/StockMovementRepository.php";

class MedicalController
{
    public static function DashboardAction()
    {
    $expiredBatches = BatchRepository::getExpiredBatches();
    $expiringBatches = BatchRepository::getExpiringBatches(90);

    $expiredCount = count($expiredBatches);
    $expiringCount = count($expiringBatches);

    $totalNotifications = $expiredCount + $expiringCount;

    
    $totalProducts = count(MedicalRepository::getAll());
    $totalBatches  = count(BatchRepository::getAll());
    $totalMovements = count(StockMovementRepository::getAll());
    $fefoWarnings = BatchRepository::getFEFOWarnings();
    
    include __DIR__ . "/../../views/templates/dashboard/index.php";
    }

    public static function listAction()
    {
        $products = MedicalRepository::getAll();
        include __DIR__ . "/../../views/templates/dashboard/products/index.php";
    }

    public static function createAction()
    {
        include __DIR__ . "/../../views/templates/dashboard/products/create.php";
    }

   
}
