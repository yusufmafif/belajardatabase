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

    $query = "SELECT * FROM rpul WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        die("Data tidak ditemukan.");
    }
} else {
    die("ID tidak ditemukan dalam URL.");
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data RPUL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Edit Data RPUL</h1>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="form-group">
                <label for="nomor">Nomor:</label>
                <input type="text" class="form-control" id="nomor" name="nomor" value="<?php echo $data['no']; ?>">
            </div>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>">
            </div>
            <div class="form-group">
                <label for="umur">Umur:</label>
                <input type="text" class="form-control" id="umur" name="umur" value="<?php echo $data['umur']; ?>">
            </div>
            <div class="form-group">
                <label for="premis">Premis:</label>
                <input type="text" class="form-control" id="premis" name="premis" value="<?php echo $data['premis']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
