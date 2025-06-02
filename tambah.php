<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $nomerhp = mysqli_real_escape_string($koneksi, $_POST['nomerhp']);
    
    // Cek apakah NIM sudah ada
    $cek = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'");
    if (mysqli_num_rows($cek) > 0) {
        header("Location: index.php?status=gagal&pesan=NIM sudah terdaftar");
        exit();
    }
    
    // Query tambah data
    $query = "INSERT INTO tb_mahasiswa (nim, nama, alamat, nomerhp) VALUES ('$nim', '$nama', '$alamat', '$nomerhp')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?status=sukses");
    } else {
        header("Location: index.php?status=gagal");
    }
} else {
    header("Location: index.php");
}
?>