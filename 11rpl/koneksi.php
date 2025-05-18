<?php
// koneksi.php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "tugas_11_rpl_1";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
