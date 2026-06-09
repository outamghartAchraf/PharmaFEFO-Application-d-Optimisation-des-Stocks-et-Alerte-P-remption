<?php
session_start();
require_once __DIR__ . "/../repository/UserRepository.php";

class UserController
{
    public static function loginAction()
    {
       require_once __DIR__ . "/../../views/auth/login.php";
    }

         public static function loginSubmitAction()
     {
         session_start();

         $email = $_POST['email'];
         $password = $_POST['password'];

         $user = UserRepository::login($email, $password);
         
         if(empty($email) || empty($password)) {
            $_SESSION['error'] = "Please fill in all fields.";
            header('Location: index.php?action=login');
            exit;
         }
         
         if (!$user) {
            $_SESSION['error'] = "Invalid email or password.";

             header('Location: index.php?action=login');
             exit;
         }

         $_SESSION['user'] = [
             'id'      => $user->id,
             'name'    => $user->name,
             'email'   => $user->email,
             'role'    => $user->role
         ];

         if ($user->role === 'ADMIN') {
             header('Location: index.php?action=admin_dashboard');
             exit;
         }

         if ($user->role === 'PHARMACIEN') {
             header('Location: index.php?action=pharmacien_dashboard');
             exit;
         }

         if ($user->role === 'PREPARATEUR') {
             header('Location: index.php?action=preparateur_dashboard');
             exit;
         }
     }

}