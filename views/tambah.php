<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah - Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="container mt-4 mb-5">

        <div class="header-section">
            <h5 class="mb-0">Tambah Film Baru</h5>
            <small>Isi form untuk menambahkan film</small>
        </div>

        <div class="form-section">
            <form action="../controllers/tambah.php" method="POST">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Film</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>

                <div class="mb-3">
                    <label for="sutradara" class="form-label">Sutradara</label>
                    <input type="text" class="form-control" id="sutradara" name="sutradara" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Tiket (Rp)</label>
                    <input type="number" class="form-control" id="harga" name="harga" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>