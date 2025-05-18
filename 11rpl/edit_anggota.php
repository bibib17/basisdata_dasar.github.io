<?php
include 'koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID tidak ditemukan!";
    exit;
}

// Ambil data anggota
$query = "SELECT * FROM anggota_perpustakaan WHERE ID = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data anggota tidak ditemukan!";
    exit;
}

// Jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama       = $_POST['Nama_Lengkap'];
    $nim        = $_POST['NIM_ID_Anggota'];
    $jk         = $_POST['Jenis_Kelamin'];
    $tgl_lahir  = $_POST['Tanggal_Lahir'];
    $alamat     = $_POST['Alamat'];
    $telepon    = $_POST['No_Telepon'];
    $email      = $_POST['Email'];
    $status     = $_POST['Status_Anggota'];
    $tgl_gabung = $_POST['Tanggal_Bergabung'];
    $username   = $_POST['Username'];
    $password   = $_POST['Password'];
    $role = $_POST['Role'];


    // Optional: hanya update password jika diisi
    $password_query = $password != '' ? ", Password = '" . $password . "'" : "";

    $update = "UPDATE anggota_perpustakaan SET 
                Nama_Lengkap = '$nama',
                NIM_ID_Anggota = '$nim',
                Jenis_Kelamin = '$jk',
                Tanggal_Lahir = '$tgl_lahir',
                Alamat = '$alamat',
                No_Telepon = '$telepon',
                Email = '$email',
                Status_Anggota = '$status',
                Tanggal_Bergabung = '$tgl_gabung',
                Username = '$username',
                Role = '$role'
                $password_query
               WHERE ID = $id";

    if (mysqli_query($conn, $update)) {
        header("Location: halaman_admin.php");
        exit;
    } else {
        echo "Gagal update data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="bg-white p-4 shadow rounded">
        <h3 class="mb-4">✏️ Edit Data Anggota</h3>
        <form method="POST">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="Nama_Lengkap" class="form-control" value="<?= $data['Nama_Lengkap'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">NIM / ID Anggota</label>
                    <input type="text" name="NIM_ID_Anggota" class="form-control" value="<?= $data['NIM_ID_Anggota'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="Jenis_Kelamin" class="form-select" required>
                        <option value="Laki-laki" <?= $data['Jenis_Kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="Perempuan" <?= $data['Jenis_Kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="Tanggal_Lahir" class="form-control" value="<?= $data['Tanggal_Lahir'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="Alamat" class="form-control" value="<?= $data['Alamat'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">No. Telepon</label>
                    <input type="text" name="No_Telepon" class="form-control" value="<?= $data['No_Telepon'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="Email" class="form-control" value="<?= $data['Email'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Status Anggota</label>
                    <select name="Status_Anggota" class="form-select" required>
                        <option value="Aktif" <?= $data['Status_Anggota'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                        <option value="Tidak Aktif" <?= $data['Status_Anggota'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Bergabung</label>
                    <input type="date" name="Tanggal_Bergabung" class="form-control" value="<?= $data['Tanggal_Bergabung'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Username</label>
                    <input type="text" name="Username" class="form-control" value="<?= $data['Username'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Password (Kosongkan jika tidak diubah)</label>
                    <input type="password" name="Password" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Role</label>
                    <select name="Role" class="form-select" required>
                        <option value="Admin" <?= $data['Role'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="Anggota" <?= $data['Role'] == 'Anggota' ? 'selected' : '' ?>>Anggota</option>
                    </select>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-between">
                <a href="halaman_admin.php" class="btn btn-secondary">🔙 Kembali</a>
                <button type="submit" class="btn btn-success">💾 Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
