<?php
require_once 'config/database.php';
require_once 'app/models/User.php'; // اتصال مدل

class AuthController
{
    public function login()
    {
        $viewFile = 'app/views/login.php';
        include 'app/views/layout.php';
    }

    public function doLogin()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->getByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('ایمیل یا رمز عبور اشتباه است'); window.location='index.php?controller=auth&action=login';</script>";
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}
