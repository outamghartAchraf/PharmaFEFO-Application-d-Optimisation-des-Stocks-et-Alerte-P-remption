<?php

require_once __DIR__ . "/src/controller/UserController.php";
require_once __DIR__ . "/src/controller/MedicalController.php";
require_once __DIR__ . "/src/controller/BatchController.php";
require_once __DIR__ . "/src/controller/StockMovementController.php";
require_once __DIR__ . "/src/controller/NotificationController.php";
require_once __DIR__ . "/src/controller/ReportController.php";

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'login':
            UserController::loginAction();
            break;

        case 'login_submit':
            UserController::loginSubmitAction();
            break;

        case 'dashboard':
            MedicalController::DashboardAction();
            break;
        case 'products':
            MedicalController::listAction();
            break;
        case 'products_create':
            MedicalController::createAction();
            break;
        case 'products_create_submit':
            MedicalController::createSubmitAction();
            break;
        case 'products_edit':
            MedicalController::editAction();
            break;
        case 'products_edit_submit':
            MedicalController::editSubmitAction();
            break;
        case 'products_delete':
            MedicalController::deleteAction();
            break;
        case 'batches':
            BatchController::listAction();
            break;
        case 'batches_create':
            BatchController::batches_create();
            break;
        case 'createSubmitAction':
            BatchController::createSubmitAction();
            break;
        case 'batch_edit':
            BatchController::editBatchAction();
            break;
        case 'batch_update':
            BatchController::updateBatch();
            break;

        case 'batch_delete':
            BatchController::deleteAction();
            break;
        case 'stock_movements':
            StockMovementController::index();
            break;
        case 'stock_create':
            StockMovementController::create_stock();
            break;

        case 'stock_store':
            StockMovementController::store();
            break;
        case 'notifications':
            NotificationController::index();
            break;
        case 'reports':
            ReportController::index();
            break;
        case 'report_stock':
            ReportController::stock();
            break;

        case 'report_expired':
            ReportController::expired();
            break;

        case 'report_expiring':
            ReportController::expiringSoon();
            break;

        case 'report_movements':
            ReportController::movements();
            break;
        case 'user_index':
            UserController::index();
            break;

        case 'user_create':
            UserController::create();
            break;

        case 'user_store':
            UserController::store();
            break;

        case 'user_edit':
            UserController::edit();
            break;

        case 'user_update':
            UserController::update();
            break;

        case 'user_delete':
            UserController::delete();
            break;
        case 'logout':
            UserController::logout();
            break;    
    }
} else {
    MedicalController::DashboardAction();
}
