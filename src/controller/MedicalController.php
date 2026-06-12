<?php

include_once __DIR__ . "/../Repository/MedicalRepository.php";
include_once __DIR__ . "/../Repository/BatchRepository.php";
include_once __DIR__ . "/../Repository/StockMovementRepository.php";
require_once __DIR__ . "/../middleware/RoleMiddleware.php";


class MedicalController
{
    public static function DashboardAction()
    {
            Middleware::isPreparateur();
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
        Middleware::isPharmacien();
        $products = MedicalRepository::getAll();
        include __DIR__ . "/../../views/templates/dashboard/products/index.php";
    }

    public static function createAction()
    {
        Middleware::isPharmacien();
        include __DIR__ . "/../../views/templates/dashboard/products/create.php";
    }

    public static function createSubmitAction()
    {
        Middleware::isPharmacien();
        $cipCode = $_POST['cip_code'];
        $designation = $_POST['designation'];
        $price = floatval($_POST['price']);
        $minStockAlert = intval($_POST['min_stock_alert']);

        if (empty($cipCode) || empty($designation) || empty($price) || empty($minStockAlert)) {
            $_SESSION['error'] = "Please fill in all fields.";
            header('Location: index.php?action=products_create');
            exit;
        }

        MedicalRepository::create($cipCode, $designation, $price, $minStockAlert);

        header('Location: index.php?action=products');
        exit;
    }

    public static function editAction()
    {
        Middleware::isPharmacien();
        $id = intval($_GET['id']);
        $product = MedicalRepository::getById($id);

        if (!$product) {
            header('Location: index.php?action=products');
            exit;
        }

        include __DIR__ . "/../../views/templates/dashboard/products/edit.php";
    }

    public static function editSubmitAction()
    {
        Middleware::isPharmacien();
        $id =  $_POST['id'];
        $cipCode = $_POST['cip_code'];
        $designation = $_POST['designation'];
        $price = floatval($_POST['price']);
        $minStockAlert = intval($_POST['min_stock_alert']);

        if (empty($cipCode) || empty($designation) || empty($price) || empty($minStockAlert)) {
            $_SESSION['error'] = "Please fill in all fields.";
            header('Location: index.php?action=products_edit&id=' . $id);
            exit;
        }

        MedicalRepository::update($id, $cipCode, $designation, $price, $minStockAlert);

        header('Location: index.php?action=products');
        exit;
    }

    public static function deleteAction()
    {
        Middleware::isPharmacien();
        $id = $_GET['id'];
        MedicalRepository::delete($id);

        header('Location: index.php?action=products');
        exit;
    }
}
