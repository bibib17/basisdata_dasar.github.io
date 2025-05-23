<?php
session_start();
include 'koneksi.php';

// Cek jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['Username']);
    $password = $_POST['Password']; // Sesuaikan dengan penyimpanan password di database

    // Cek ke database
    $query = "SELECT * FROM anggota_perpustakaan WHERE Username='$username' AND Password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['Username'] = $user['Username'];
        $_SESSION['Role'] = $user['Role'];

        // Redirect sesuai role
        if ($user['Role'] === 'Admin') {
            header("Location: halaman_admin.php");
        } elseif ($user['Role'] === 'Anggota') {
            header("Location: tampil_anggota.php");
        } else {
            $error = "Role tidak dikenali!";
        }
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4 bg-white p-4 shadow rounded">
            <h3 class="text-center mb-4">🔐 Login</h3>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="Username" class="form-control" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="Password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
