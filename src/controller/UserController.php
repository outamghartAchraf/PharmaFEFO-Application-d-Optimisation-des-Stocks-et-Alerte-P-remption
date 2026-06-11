<?php
session_start();
require_once __DIR__ . "/../repository/UserRepository.php";
require_once __DIR__ . "/../repository/RoleRepository.php";

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

         if ($user->role === 'ADMIN' || $user->role === 'PHARMACIEN' || $user->role === 'PREPARATEUR') {
             header('Location: index.php?action=dashboard');
             exit;
         }

 
     }

      public static function index()
    {
        $users = UserRepository::getAll();
        include __DIR__ . '/../../views/templates/dashboard/users/index.php';
    }

    public static function create()
    {
        $roles = RoleRepository::getAll();
        include __DIR__ . '/../../views/templates/dashboard/users/create.php';
    }

    public static function store()
    {
        $name     = trim($_POST['name']);
        $email    = trim($_POST['email']);
        $password = $_POST['password'];
        $roleId   = (int) $_POST['role_id'];

        if (!$name || !$email || !$password || !$roleId) {
            $_SESSION['error'] = "All fields are required";
            header("Location: index.php?action=user_create");
            exit;
        }

        UserRepository::create($name, $email, $password, $roleId);

        $_SESSION['success'] = "User created successfully";
        header("Location: index.php?action=user_index");
        exit;
    }

    public static function edit()
    {
        $id = (int) $_GET['id'];

        $user = UserRepository::getById($id);
        $roles = RoleRepository::getAll();

        include __DIR__ . '/../../views/templates/dashboard/users/edit.php';
    }

    public static function update()
    {
        $id     = (int) $_POST['id'];
        $name   = trim($_POST['name']);
        $email  = trim($_POST['email']);
        $roleId = (int) $_POST['role_id'];

        if (!$id || !$name || !$email || !$roleId) {
            $_SESSION['error'] = "Invalid data";
            header("Location: index.php?action=user_edit&id=$id");
            exit;
        }

        UserRepository::update($id, $name, $email, $roleId);

        $_SESSION['success'] = "User updated successfully";
        header("Location: index.php?action=user_index");
        exit;
    }

    public static function delete()
    {
        $id = (int) $_GET['id'];

        UserRepository::delete($id);

        $_SESSION['success'] = "User deleted";
        header("Location: index.php?action=user_index");
        exit;
    }

}