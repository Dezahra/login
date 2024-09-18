<?php
session_start();
include 'db.php';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        .login-container {
            background: #fff;
            padding: 3rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .btn-login {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            color: #fff;
            padding: 0.75rem;
            border-radius: 10px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-login:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            transform: translateY(-2px);
        }

        .form-control {
            border-radius: 8px;
            padding: 0.75rem;
            font-size: 1rem;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .text-danger {
            text-align: center;
            margin-top: 1rem;
        }

        p {
            text-align: center;
            margin-top: 1rem;
        }

        a {
            color: #2575fc;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form method="post">
        <div class="form-group mb-3">
            <label>Email:</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-login mt-3">Login</button>
        <p class="text-danger"><?= $error; ?></p>
    </form>
    <p>Belum punya akun? <a href="register.php">Daftar disini</a></p>
</div>

</body>
</html>
