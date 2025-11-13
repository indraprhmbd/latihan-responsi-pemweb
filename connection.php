<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'bioskop';
$port = 3306;

try {
    $connection = new mysqli($host, $user, $pass, $db, $port);
} catch (mysqli_sql_exception $e) {
    echo "Koneksi gagal!, error: " . $e->getMessage();
}
