<?php
include 'koneksi.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    
    // Query untuk menghapus data
    $query = "DELETE FROM tb_mahasiswa WHERE nim = $nim";
    
    if (mysqli_query($koneksi, $query)) {
        // Redirect ke halaman utama setelah berhasil hapus
        header("Location: index.php?status=sukses");
    } else {
        // Redirect dengan status gagal jika error
        header("Location: index.php?status=gagal");
    }
} else {
    // Redirect jika tidak ada ID
    header("Location: index.php");
}
?>