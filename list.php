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
    <title>DATA RPUL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <div class="container mt-4">
        <h1>Data RPUL</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nomor</th>
                    <th>Nama Lengkap</th>
                    <th>Umur</th>
                    <th>Premis</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mengganti nama variabel $result dengan data yang sesuai dari database MySQL
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['no'] . "</td>";
                    echo "<td>" . $row['nama_lengkap'] . "</td>";
                    echo "<td>" . $row['umur'] . "</td>";
                    echo "<td>" . $row['premis'] . "</td>";
                    echo "<td>
                            <a class='btn btn-danger btn-sm' href='delete.php?id=" . $row['id'] . "'>Delete</a>
                            <a class='btn btn-primary btn-sm' href='edit.php?id=" . $row['id'] . "'>Edit</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
