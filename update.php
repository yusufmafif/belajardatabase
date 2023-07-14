<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "belajardb";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$id = $_POST['id'];
$nomor = $_POST['nomor'];
$nama_lengkap = $_POST['nama_lengkap'];
$umur = $_POST['umur'];
$premis = $_POST['premis'];

$query = "UPDATE rpul SET no = '$nomor', nama_lengkap = '$nama_lengkap', umur = '$umur', premis = '$premis' WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "Data berhasil diperbarui.";
    header("Location: list.php");
    exit();
} else {
    echo "Data gagal diperbarui: " . mysqli_error($koneksi);
}


mysqli_close($koneksi);
?>
