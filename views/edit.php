<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include_once(__DIR__ . '/../connection.php');

if (!isset($_GET['id'])) {
    die("ID film tidak ditemukan.");
}

$id = $_GET['id'];
$sql = "SELECT * FROM film WHERE id_film = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows != 1) {
    die("Data film tidak ditemukan.");
}

$film = $result->fetch_assoc();
$stmt->close();
$connection->close();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit - Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="container mt-4 mb-5">
        <div class="header-section">
            <h5 class="mb-0">Edit Film</h5>
            <small>Perbarui informasi film</small>
        </div>

        <div class="form-section">
            <form action="../controllers/edit.php" method="POST">
                <div class="mb-3">
                    <label for="id" class="form-label">ID Film</label>
                    <input type="text" class="form-control" id="id" name="id" value="<?= htmlspecialchars($film['id_film']) ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Film</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= htmlspecialchars($film['judul_film']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="sutradara" class="form-label">Sutradara</label>
                    <input type="text" class="form-control" id="sutradara" name="sutradara" value="<?= htmlspecialchars($film['sutradara']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Tiket (Rp)</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?= htmlspecialchars($film['harga_tiket']) ?>" required>
                </div>

                <button type="submit" class="btn btn-success">Perbarui</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

</body>

</html>