<?php
include_once(__DIR__ . '/../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $sutradara = $_POST['sutradara'];
    $harga = $_POST['harga'];

    $sql = "INSERT INTO film (judul_film, sutradara, harga_tiket) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssi", $judul, $sutradara, $harga);

    if ($stmt->execute()) {
        header("Location: ../views/index.php?msg=success");
        exit;
    } else {
        echo "Gagal menambahkan film: " . $connection->error;
    }

    $stmt->close();
    $connection->close();
}
