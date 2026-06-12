<?php
include_once __DIR__ . "/../Repository/BatchRepository.php";
include_once __DIR__ . "/../Repository/MedicalRepository.php";
 require_once __DIR__ . "/../middleware/RoleMiddleware.php";

class BatchController
{

    public static function listAction()
    {
         Middleware::isPharmacien(); 

        $batches = BatchRepository::getAll();
        include __DIR__ . "/../../views/templates/dashboard/batches/index.php";
    }

    public static function batches_create()
    {
        Middleware::isPharmacien();
        $products = MedicalRepository::getAll();
        include __DIR__ . "/../../views/templates/dashboard/batches/create.php";
    }

    public static function createSubmitAction()
    {
            Middleware::isPharmacien();
        $productId      = $_POST['product_id'];
        $quantity       = $_POST['quantity'];
        $expirationDate = $_POST['expiration_date'];
        $batchNumber    = trim($_POST['batch_number']);

        if ($expirationDate < date('Y-m-d')) {
            $_SESSION['error'] = "Expiration date cannot be in the past.";
            header('Location: index.php?action=batches_create');
            exit;
        }


        if (
            empty($productId) ||
            empty($quantity) ||
            empty($expirationDate) ||
            empty($batchNumber)
        ) {
            $_SESSION['error'] = "Please fill in all fields.";
            header('Location: index.php?action=batches_create');
            exit;
        }


        BatchRepository::create(
            $productId,
            $batchNumber,
            $expirationDate,
            $quantity
        );

        $_SESSION['success'] = "Batch created successfully!";
        header('Location: index.php?action=batches');
        exit;
    }


    public static function editBatchAction()
    {
        Middleware::isPharmacien();
        $batchId = $_GET['id'];
        $products = MedicalRepository::getAll();
        $batch = BatchRepository::getById($batchId);
        if (!$batch) {
            header('Location: index.php?action=batches');
            exit;
        }
        include __DIR__ . "/../../views/templates/dashboard/batches/edit.php";
    }

    public static function updateBatch()
    {
        Middleware::isPharmacien();
        $batchId        =  $_POST['id'];
        $productId      =  $_POST['product_id'];
        $batchNumber    = trim($_POST['batch_number']);
        $expirationDate = $_POST['expiration_date'];

        $qtyReceived  =  $_POST['qty_received'];
        $qtyAvailable =  $_POST['qty_available'];
        $status       = $_POST['status'];

        if (
            empty($batchId) ||
            empty($productId) ||
            empty($batchNumber) ||
            empty($expirationDate)
        ) {
            $_SESSION['error'] = "Please fill in all fields.";
            header('Location: index.php?action=batch_edit&id=' . $batchId);
            exit;
        }

        if ($expirationDate < date('Y-m-d')) {
            $_SESSION['error'] = "Expiration date cannot be in the past.";
            header('Location: index.php?action=batch_edit&id=' . $batchId);
            exit;
        }

        
        BatchRepository::update(
            $batchId,
            $productId,
            $batchNumber,
            $expirationDate,
            $qtyReceived,
            $qtyAvailable,
            $status
        );

        $_SESSION['success'] = "Batch updated successfully!";
        header('Location: index.php?action=batches');
        exit;
    }

    public static function deleteAction()
    {
        Middleware::isPharmacien();
        $batchId = $_GET['id'];
        BatchRepository::delete($batchId);
        $_SESSION['success'] = "Batch deleted successfully!";
        header('Location: index.php?action=batches');
        exit;
    }
}
