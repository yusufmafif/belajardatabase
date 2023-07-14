<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "belajardb";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomor = $_POST["nomor"];
    $namaLengkap = $_POST["nama_lengkap"];
    $umur = $_POST["umur"];
    $premis = $_POST["premis"];
    
    $query = "INSERT INTO rpul (no, nama_lengkap, umur, premis) VALUES ('$nomor', '$namaLengkap', '$umur', '$premis')";
    $result = mysqli_query($koneksi, $query);
    
    if ($result) {
        echo "<script>alert('Data berhasil ditambahkan.'); window.location.href = 'list.php';</script>";
        exit;
    } else {
        echo "Data gagal ditambahkan: " . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data RPUL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Tambah Data RPUL</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="nomor">Nomor:</label>
                <input type="text" class="form-control" id="nomor" name="nomor" required>
            </div>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
            </div>
            <div class="form-group">
                <label for="umur">Umur:</label>
                <input type="text" class="form-control" id="umur" name="umur" required>
            </div>
            <div class="form-group">
                <label for="premis">Premis:</label>
                <input type="text" class="form-control" id="premis" name="premis" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
