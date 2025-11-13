<?php
session_start();

if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
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
    <title>Register - Film</title>
</head>

<body>
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-5 card">
                <img src="./assets/film.jpg" alt="" class="img-fluid" style="min-height:100vh; background-color:gray;">
            </div>
            <div class="col-md-7">

                <form class="p-5 my-auto mx-3" action="../controllers/register.php" method="POST">
                    <div class="mb-4">
                        <h1><strong>Register</strong></h1>
                        <p>Isi semua data dengan benar</p>
                    </div>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="fullname" aria-describedby="emailHelp" name="fullname">
                    </div>
                    <div class="mb-3">
                        <label for="username-input" class="form-label">Username</label>
                        <input type="username" class="form-control" id="username-input" aria-describedby="emailHelp" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password-input" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password-input" name="password1">
                    </div>
                    <div class="mb-4">
                        <label for="confirmPassword-input" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="confirmPassword-input" name="password2">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn submit-btn">Register</button>
                        <button onclick="window.location.href='login.php'" class="btn btn-secondary ms-2">Kembali</button>
                    </div>
                    <div class="mb-3">
                        <p>Sudah punya akun? <a href="login.php">Login disini</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function validatePasswords() {
            const pass1 = document.getElementById('password-input').value;
            const pass2 = document.getElementById('confirmPassword-input').value;

            if (pass1 !== pass2) {
                alert('Password dan konfirmasi password tidak sama!');
                return false; 
            }
            return true; 
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>