<?php
include_once __DIR__ . "/../../config/DB.php";
include_once __DIR__ . "/BaseRepository.php";

class UserRepository extends BaseRepository
{
   
    public static function login($email, $password)
    {
        $stmt = self::getConnection()->prepare("
        SELECT
            users.*,
            roles.label AS role
        FROM users
        INNER JOIN roles
            ON users.role_id = roles.id
        WHERE users.email = ?
    ");

        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user->password)) {
            return false;
        }

        return $user;
    }
   
}