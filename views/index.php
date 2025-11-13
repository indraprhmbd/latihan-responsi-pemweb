<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['msg']) && $_GET['msg'] == 'deleted'):
    echo "<div class='alert alert-danger'>Film berhasil dihapus!</div>";
endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <title>Dashboard - Film</title>
</head>

<body>
    <div class="container-fluid main-title p-3">
        <div class="ms-3">
            <h1>Manajemen Film Bioskop</h1>
            <p>Selamat datang, <strong><?= $_SESSION['username'] ?></strong> | <a href="../controllers/logout.php" style="color: white;">Logout</a></p>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row my-3 mx-3">
            <div class="col-md-4">
                <a href="tambah.php" class="btn btn-success">Tambah Film</a>
            </div>
        </div>
        <div class="row mx-3 px-5 py-2">
            <div class="table-area" style="overflow:hidden;">

                <div class="table-scroll" style="max-height:360px; overflow:auto;">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:60px">ID</th>
                                <th style="width: 350px;">Judul</th>
                                <th>Sutradara</th>
                                <th style="width:180px">Harga (Rp)</th>
                                <th style="width:140px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../connection.php';
                            $totalSum = 0;
                            $query = mysqli_query($connection, "SELECT * FROM film");
                            if (mysqli_num_rows($query) == 0) {
                                echo "<tr>
                                        <td colspan='5' class='text-center'>Tidak Ada Data Film.</td>
                                    </tr>";
                            } else {
                                while ($data = mysqli_fetch_assoc($query)):
                                    $totalSum += $data['harga_tiket'];
                            ?>
                                    <tr>
                                        <td><?= $data['id_film']; ?></td>
                                        <td><?= $data['judul_film']; ?></td>
                                        <td><?= $data['sutradara']; ?></td>
                                        <td>Rp <?= number_format($data['harga_tiket'], 0, ',', '.'); ?></td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $data['id_film']; ?>">Edit | </a>
                                            <a href="../controllers/delete.php?id=<?php echo $data['id_film']; ?>" onclick="return confirm('Yakin ingin menghapus?')" class="text-danger">Delete</a>
                                        </td>
                                    </tr>
                            <?php endwhile;
                            }
                            ?>
                        <tfoot>
                            <tr class="fw-bold">
                                <td colspan="3">Total Harga Tiket</td>
                                <td colspan="2">Rp <?= number_format($totalSum, 0, ',', '.') ?></td>
                            </tr>
                        </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>