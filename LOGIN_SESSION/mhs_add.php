<?php
include './class_db.php';
$db = new database();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Mahasiswa</title>
</head>

<body>
    <h2>Tambah Data Mahasiswa</h2>
    <?php include './menu.php'; ?>
    <form method="post" action="mhs_proc.php">
        <label for="npm">NPM</label>
        <br><input type="text" name="npm" id="npm" required>
        <br><label for="nama">Nama</label>
        <br><input type="text" name="nama" id="nama" required>
        <br><label for="prodi_id">Prodi</label>
        <br>
        <select name="prodi_id" id="prodi_id" required>
            <?php
            $sql_pr = "SELECT * FROM prodi";
            $data_pr = $db->fetchdata($sql_pr);
            foreach ($data_pr as $data) {
                echo "<option value='" . htmlspecialchars($data['id']) . "'>" . htmlspecialchars($data['nama']) . "</option>";
            }
            ?>
        </select>
        <br><label for="alamat">Alamat</label>
        <br><textarea name="alamat" id="alamat" required></textarea>
        <br><br><input type="submit" name="submit_add" value="SIMPAN">
    </form>
</body>

</html>
