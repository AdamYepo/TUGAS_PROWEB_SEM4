<?php
include './class_db.php';
$db = new database();

if (isset($_POST['cari'])) {
    //echo 'cari'
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
} else {
    $npm = '';
    $nama = '';
}
?>
<!DOCTYPE html>
<html>

<head>
    <Title>Mahasiswa</Title>
</head>

<body>
    <h2>Data Mahasiswa</h2>
    <form method="post" action="">
        <input type="text" name="npm" value="<?= $npm ?>" placeholder="NPM">
        <input type="text" name="nama" value="<?= $nama ?>" placeholder="Nama">
        <input type="submit" name="cari" value="Cari">
    </form>'
    <?php include './menu.php'; ?>
    <table width="100%" align="center" border="1">
        <thead>
            <tr>
                <th width="10%">#</th>
                <th width="10%">No</th>
                <th width="20%">NPM</th>
                <th>Nama</th>
                <th width="30%">Prodi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT MHS.*, PR.nama as pr_nama
    FROM mahasiswa MHS
    JOIN prodi PR ON MHS.prodi_id = PR.id
    WHERE MHS.npm LIKE '%$npm%'
    AND MHS.nama LIKE '%$nama%'
    ORDER BY MHS.nama";
            $data = $db->fetchdata($sql);
            $i = 0;
            foreach ($data as $dat) {
                $i++;
                echo "<tr>
                 <td><a href='mhs_detil.php?npm=" . $dat['npm'] . "'>Detil</a></td>
                 <td>$i</td>
                 <td>" . $dat['npm'] . "</td>
                 <td>" . $dat['nama'] . "</td>
                 <td>" . $dat['pr_nama'] . "</td>
              </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>