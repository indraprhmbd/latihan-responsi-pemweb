<?php
include_once(__DIR__ . '/../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $sutradara = $_POST['sutradara'];
    $harga = $_POST['harga'];

    $sql = "UPDATE film SET judul_film = ?, sutradara = ?, harga_tiket = ? WHERE id_film = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssii", $judul, $sutradara, $harga, $id);

    if ($stmt->execute()) {
        header("Location: ../views/index.php?msg=updated");
        exit;
    } else {
        echo "Gagal memperbarui data: " . $connection->error;
    }

    $stmt->close();
    $connection->close();
}
