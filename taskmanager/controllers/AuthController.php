<?php
require_once __DIR__ . '/../config/db.php';

class AuthController {
    public function register()
    {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            if (empty($username) || empty($email) || empty($password)) {
                $error = 'لطفاً همه فیلدها را پر کنید.';
            } else {
                // بررسی اینکه کاربر تکراری نباشد
                global $pdo;
                $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
                $stmt->execute([
                    ':username' => $username,
                    ':email' => $email
                ]);
                if ($stmt->fetch()) {
                    $error = 'کاربری با این نام یا ایمیل قبلاً ثبت شده است.';
                } else {
                    // هش کردن پسورد
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $insert = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
                    $insert->execute([
                        ':username' => $username,
                        ':email' => $email,
                        ':password' => $hashed_password
                    ]);

                    // هدایت به صفحه ورود
                    header("Location: login.php");
                    exit;
                }
            }
        }

        include __DIR__ . '/../views/auth/register.php';
    }
    public function login()
{
    session_start();
    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            $error = 'لطفاً همه فیلدها را پر کنید.';
        } else {
            global $pdo;
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->execute([':username' => $username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                // هدایت به صفحه داشبورد
                header("Location: index.php");
                exit;
            } else {
                $error = 'نام کاربری یا رمز عبور نادرست است.';
            }
        }
    }

    include __DIR__ . '/../views/auth/login.php';
}

}
