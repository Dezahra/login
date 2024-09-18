<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
        }

        .card-header {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            border-bottom: none;
            border-radius: 15px 15px 0 0;
            text-align: center;
            padding: 1.5rem;
        }

        .card-body {
            padding: 2rem;
            text-align: center;
        }

        .btn-danger {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border: none;
            color: #fff;
            padding: 0.75rem;
            border-radius: 10px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            width: 100%;

        }

        .btn-danger:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <h4>Dashboard</h4>
    </div>
    <div class="card-body">
        <h2 class="mt-3">Selamat Datang, <?= htmlspecialchars($_SESSION['user']); ?>!</h2>
        <p class="mt-4">Ini adalah halaman dashboard Anda. Anda dapat melihat informasi dan melakukan berbagai tindakan di sini.</p>
        <a href="logout.php" class="btn btn-danger mt-4">Logout</a>
    </div>
</div>
</body>
</html>
