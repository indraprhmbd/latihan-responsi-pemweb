<?php
session_start();

if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']); // clear after showing
}

if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <title>Login - Film</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row m-auto">
            <div class="col-md-5 card">
                <img src="./assets/film.jpg" alt="" class="img-fluid" style="min-height:100vh; background-color:gray;">
            </div>
            <div class="col-md-7">
                <form class="p-5 my-auto mx-3" action="../controllers/login.php" method="POST">
                    <div class="mb-4">
                        <h1><strong>Login</strong></h1>
                        <p>Masukkan username dan password</p>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
                    </div>
                    <div class="mb-4">
                        <label for="password-input" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password-input" name="password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn submit-btn bg-dark text-light m-auto">Login</button>
                    </div>
                    <div class="mb-3">
                        <p>Belum punya akun? <a href="register.php">Daftar disini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>