<?php
include 'db.php';
$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$username, $password]);
        $msg = "Registrasi berhasil! Silakan <a href='index.php'>login</a>.";
    } catch (PDOException $e) {
        $msg = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        .card-header {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            border-bottom: none;
            border-radius: 15px 15px 0 0;
        }

        .card-body {
            padding: 2rem;
        }

        .btn-primary {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            color: #fff;
            padding: 0.75rem;
            border-radius: 10px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            color: #fff;
            padding: 0.75rem;
            border-radius: 10px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-secondary:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            transform: translateY(-2px);
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .alert {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-header text-center">
        <h4>Register</h4>
    </div>
    <div class="card-body">
        <?php if ($msg): ?>
            <div class="alert alert-info"><?php echo $msg; ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="username">Email:</label>
                <input type="email" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="login.php" class="btn btn-secondary mt-3">Back to Login</a>
        </form>
    </div>
</div>
</body>
</html>
