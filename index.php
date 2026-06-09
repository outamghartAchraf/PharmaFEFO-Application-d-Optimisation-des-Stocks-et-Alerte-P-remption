<?php

require_once __DIR__ . "/src/controller/UserController.php";

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'login':
            UserController::loginAction();
            break;
            

         
    }
} else {
     
}
