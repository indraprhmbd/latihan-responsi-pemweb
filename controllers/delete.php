<?php
include_once(__DIR__ . '/../connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    if (!is_numeric($id)) {
        die("ID film tidak valid.");
    }

    $sql = "DELETE FROM film WHERE id_film = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../views/index.php?msg=deleted");
        exit;
    } else {
        echo "Gagal menghapus data: " . $connection->error;
    }

    $stmt->close();
    $connection->close();
} else {
    die("ID film tidak ditemukan.");
}
