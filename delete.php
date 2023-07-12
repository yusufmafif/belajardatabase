<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "belajardb";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Periksa apakah parameter 'no' ada dalam URL
if (isset($_GET['no'])) {
    $no = $_GET['no'];

    // Lakukan query delete
    $query = "DELETE FROM rpul WHERE no = '$no'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Data dengan nomor $no berhasil dihapus.";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    echo "Nomor tidak tersedia.";
}

mysqli_close($koneksi);
?>
