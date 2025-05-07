-- 1. Buat dulu databasenya
CREATE DATABASE tugas_11_rpl_1;

-- 2. Gunakan database tersebut
USE tugas_11_rpl_1;

-- 3. Buat tabel anggota_perpustakaan
CREATE TABLE anggota_perpustakaan (
    ID INT PRIMARY KEY,
    Nama_Lengkap VARCHAR(100),
    NIM_ID_Anggota VARCHAR(10),
    Jenis_Kelamin ENUM('Laki-laki', 'Perempuan'),
    Tanggal_Lahir DATE,
    Alamat VARCHAR(255),
    No_Telepon VARCHAR(15),
    Email VARCHAR(100),
    Status_Anggota ENUM('Aktif', 'Tidak Aktif'),
    Tanggal_Bergabung DATE
);

-- 4. Masukkan data ke tabel
INSERT INTO anggota_perpustakaan (ID, Nama_Lengkap, NIM_ID_Anggota, Jenis_Kelamin, Tanggal_Lahir, Alamat, No_Telepon, Email, Status_Anggota, Tanggal_Bergabung)
VALUES 
(1, 'Andi Pratama', 'A001', 'Laki-laki', '2000-01-12', 'Jl. Merpati No.1', '081234567890', 'andi@example.com', 'Aktif', '2022-03-15'),
(2, 'Siti Rahmawati', 'A002', 'Perempuan', '1999-05-30', 'Jl. Kenari No.5', '081298765432', 'siti.rahma@example.com', 'Aktif', '2021-11-20'),
(3, 'Bambang Suharto', 'A003', 'Laki-laki', '1998-07-19', 'Jl. Cendana No.9', '082112345678', 'bambang@example.com', 'Tidak Aktif', '2020-09-10'),
(4, 'Dewi Lestari', 'A004', 'Perempuan', '2001-03-08', 'Jl. Melati No.3', '083812345679', 'dewi.lestari@example.com', 'Aktif', '2023-01-05'),
(5, 'Rizky Hidayat', 'A005', 'Laki-laki', '2000-12-25', 'Jl. Anggrek No.7', '085612345680', 'rizky.hidayat@example.com', 'Aktif', '2022-07-18'),
(6, 'Fitri Anjani', 'A006', 'Perempuan', '1997-09-14', 'Jl. Dahlia No.4', '081234567891', 'fitri.anjani@example.com', 'Tidak Aktif', '2019-06-22'),
(7, 'Anton Wijaya', 'A007', 'Laki-laki', '1995-02-27', 'Jl. Flamboyan No.2', '085612345681', 'anton.wijaya@example.com', 'Aktif', '2021-04-09'),
(8, 'Nisa Maulida', 'A008', 'Perempuan', '2002-10-11', 'Jl. Mawar No.8', '083812345682', 'nisa.maulida@example.com', 'Aktif', '2023-05-30'),
(9, 'Dedi Gunawan', 'A009', 'Laki-laki', '2001-06-05', 'Jl. Semangka No.6', '082112345683', 'dedi.gunawan@example.com', 'Tidak Aktif', '2020-12-12'),
(10, 'Lina Kusuma', 'A010', 'Perempuan', '1998-08-17', 'Jl. Rambutan No.10', '081298765433', 'lina.kusuma@example.com', 'Aktif', '2022-10-01');
