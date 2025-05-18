<?php
// 1. Koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "tugas_11_rpl_1";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// 2. Ambil parameter filter & search
$search = isset($_GET['search']) ? $_GET['search'] : '';
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

// 3. Query SQL dinamis
$sql = "SELECT * FROM anggota_perpustakaan WHERE 1";

if ($search != '') {
    $sql .= " AND (Nama_Lengkap LIKE '%$search%' OR NIM_ID_Anggota LIKE '%$search%')";
}

if ($filter != '') {
    $sql .= " AND Status_Anggota = '$filter'";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Anggota Perpustakaan</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">📚 Daftar Anggota Perpustakaan</h2>

    <!-- Form Filter & Search -->
    <form class="row g-3 mb-4" method="GET">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Cari Nama / NIM..." value="<?= htmlspecialchars($search) ?>">
        </div>
        <div class="col-md-3">
            <select name="filter" class="form-select">
                <option value="">Semua Status</option>
                <option value="Aktif" <?= $filter == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                <option value="Tidak Aktif" <?= $filter == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">🔍 Cari</button>
        </div>
        <div class="col-md-2">
            <a href="tampil_anggota.php" class="btn btn-secondary w-100">🔄 Reset</a>
        </div>
    </form>

    <!-- Tabel Data -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>NIM/ID Anggota</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Email</th>
                    <th>Status Anggota</th>
                    <th>Tanggal Bergabung</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr class="text-center">
                            <td><?= $row['ID'] ?></td>
                            <td><?= $row['Nama_Lengkap'] ?></td>
                            <td><?= $row['NIM_ID_Anggota'] ?></td>
                            <td><?= $row['Jenis_Kelamin'] ?></td>
                            <td><?= $row['Tanggal_Lahir'] ?></td>
                            <td><?= $row['Alamat'] ?></td>
                            <td><?= $row['No_Telepon'] ?></td>
                            <td><?= $row['Email'] ?></td>
                            <td><?= $row['Status_Anggota'] ?></td>
                            <td><?= $row['Tanggal_Bergabung'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="10" class="text-center text-danger">Data tidak ditemukan!</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

<?php
mysqli_close($conn);
?>
