<?php

class RoleMiddleware
{

  public static function Auth() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
  }
    public static function check(array $allowedRoles): void
    {
           RoleMiddleware::Auth();

        $userRole = $_SESSION['user']['role'] ?? '';

        if (!in_array($userRole, $allowedRoles)) {
            http_response_code(403);
            die("Access Denied");
        }
    }
}