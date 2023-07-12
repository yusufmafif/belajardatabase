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

<<!DOCTYPE html>
<html>
<head>
    <title>Contoh MySQL ke HTML</title>
    <style>
        /* Gaya untuk garis vertikal */
        th, td {
            padding: 5px;
            border-right: 1px solid black;
        }
        
        /* Gaya untuk garis di header */
        th {
            border-bottom: 1px solid black;
        }
        
        /* Gaya untuk garis di sel data */
        td {
            border-bottom: 1px dotted black;
        }
    </style>
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
            <th>Action</th> <!-- Kolom tambahan untuk tombol delete -->
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
            echo "<td><a href='delete.php?no=" . $row['no'] . "'>Delete</a></td>"; // Tombol delete dengan link ke file delete.php
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    mysqli_close($koneksi);
    ?>
</body>
</html>

