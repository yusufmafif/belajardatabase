<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "belajardb";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM rpul";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contoh MySQL ke HTML</title>
</head>
<body>
    <h1>Data rpul</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Nomor</th>
            <th>Nama Lengkap</th>
            <th>Umur</th>
            <th>Premis</th>
        </tr>

        <?php
        // Mengganti nama variabel $result dengan data yang sesuai dari database MySQL
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['no'] . "</td>";
            echo "<td>" . $row['nama_lengkap'] . "</td>";
            echo "<td>" . $row['umur'] . "</td>";
            echo "<td>" . $row['premis'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    mysqli_close($koneksi);
    ?>
</body>
</html>
