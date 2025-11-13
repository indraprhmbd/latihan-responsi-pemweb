<?php

include_once(__DIR__ . '/../connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $redirect = "../views/register.php";

    $fullname = trim($_POST['fullname'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password1 = trim($_POST['password1'] ?? '');
    $password2 = trim($_POST['password2'] ?? '');

    if ($username === '' || $password1 === '' || $password2 === '') {
        $_SESSION['error'] = "Semua kolom wajib diisi!";
        header("Location: $redirect");
        exit;
    }

    if ($password1 !== $password2) {
        $_SESSION['error'] = "Konfirmasi password tidak cocok!";
        header("Location: $redirect");
        exit;
    }

    $check = $connection->prepare("SELECT username FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $_SESSION['error'] = "Username sudah digunakan!";
        header("Location: $redirect");
    }
    $check->close();

    $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password, nama_lengkap) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss", $username, $hashedPassword, $fullname);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
        $redirect = "../views/login.php";
    } else {
        $_SESSION['error'] = "Gagal melakukan registrasi. Silakan coba lagi.";
        header("Location: $redirect");
    }

    $stmt->close();
    $connection->close();
    header("Location: $redirect");
    exit;
}
