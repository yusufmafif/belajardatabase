<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "belajardb";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM rpul WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus.'); window.location.href = 'list.php';</script>";
        exit;
    } else {
        echo "Data gagal dihapus: " . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak ditemukan dalam URL.";
}

mysqli_close($koneksi);
?>
