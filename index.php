<?php
include_once 'config/Database.php';
include_once 'classes/Mahasiswa.php';

$database = new Database();
$db = $database->getConnection();

$mahasiswa = new Mahasiswa($db);

if ($_POST) {
    $mahasiswa->nim = $_POST['nim'];
    $mahasiswa->nama = $_POST['nama'];
    $mahasiswa->jurusan = $_POST['jurusan'];
    $mahasiswa->alamat = $_POST['alamat'];
    $mahasiswa->email = $_POST['email'];
    $mahasiswa->no_hp = $_POST['no_hp'];

    $mahasiswa->create();
}

$stmt = $mahasiswa->read();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>

<h2>Input Data Mahasiswa</h2>

<form method="post">
    NIM:<br>
    <input type="text" name="nim"><br><br>

    Nama:<br>
    <input type="text" name="nama"><br><br>

    Jurusan:<br>
    <input type="text" name="jurusan"><br><br>

    Alamat:<br>
    <textarea name="alamat"></textarea><br><br>

    Email:<br>
    <input type="email" name="email"><br><br>

    No HP:<br>
    <input type="text" name="no_hp"><br><br>

    <input type="submit" value="Simpan">
</form>

<hr>

<h2>Daftar Mahasiswa</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>No HP</th>
    </tr>

    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['nim']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['jurusan']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['no_hp']; ?></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>