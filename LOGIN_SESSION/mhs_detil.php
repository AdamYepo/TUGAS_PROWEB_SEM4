<?php
include './class_db.php';
$db = new database(); 

$npm = $_GET['npm'];

$sql = "SELECT * FROM mahasiswa WHERE npm='$npm'";
$dat = $db->datasql($sql);



?>
<!DOCTYPE html>
<html>

<head>
    <title>Mahasiswa</title>
</head>

<body>
    <h2>Detil Data Mahasiswa</h2>
    <?php include './menu.php' ?>
    <form method="post" action="mhs_proc.php">
        NPM
        <br><input type="text" name="npm" value="<?= $dat['npm'] ?>">
        <br>
        <br><input type="text" name="nama" value="<?= $dat['nama'] ?>">
        <br>Prodi
        <br>
        <select name="prodi_id">
            <?php
            $sql_pr = "SELECT * FROM prodi";
            $data_pr = $db->fetchdata($sql_pr);
            foreach ($data_pr as $dat_pr) {
                if ($dat_pr['id'] == $dat['prodi_id'])
                    $selected = 'selected';
                else
                    $selected = '';
                echo "<option value='" . $dat_pr['id'] . "'$selected>" . $dat_pr['nama'] . "</option>";
            }
            ?>
        </select>
        <br>Alamat
        <br><textarea name="alamat"><?= $dat['alamat'] ?></textarea>
        <br><br>
        <input type="submit" name="submit_delete" value="HAPUS" onclick="return confirm('yakin hapus data?')">
        <input type="submit" name="submit_edit" value="SIMPAN">
        <input type="hidden" name="npm_old" value="<?= $dat['npm'] ?>">
    </form>

</body>

</html>