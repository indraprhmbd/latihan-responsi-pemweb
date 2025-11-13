<?php
include_once(__DIR__ . "/../connection.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $redirect = "../views/login.php";

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $_SESSION['error'] = "Username dan password wajib diisi!";
        header("Location: $redirect");
        exit;
    }

    $sql = "SELECT username, password FROM users WHERE username = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['success'] = "Selamat datang, $username!";
            $redirect = "../views/index.php";
        } else {
            $_SESSION['error'] = "Password salah!";
        }
    } else {
        $_SESSION['error'] = "Username tidak ditemukan!";
    }

    $stmt->close();
    $connection->close();
    header("Location: $redirect");
    exit;
}
