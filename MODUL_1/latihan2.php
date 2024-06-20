<!DOCTYPE html>
<html>
<head>
    <title>Konversi Nilai Mata Kuliah</title>
</head>
<body>

<h2>Konversi Nilai Mata Kuliah</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="nilai_angka">Nilai Angka:</label>
    <input type="number" id="nilai_angka" name="nilai_angka" value="<?php echo isset($_POST['nilai_angka']) ? $_POST['nilai_angka'] : ''; ?>" required>
    <br><br>
    <label for="nilai_huruf">Nilai Huruf:</label>
    <input type="text" id="nilai_huruf" name="nilai_huruf" value="<?php echo isset($_POST['nilai_huruf']) ? $_POST['nilai_huruf'] : ''; ?>" readonly>
    <br><br>
    <input type="submit" name="konversi" value="Konversi">
</form>

<?php
// Inisialisasi variabel nilai_angka dan nilai_huruf
$nilai_angka = isset($_POST['nilai_angka']) ? $_POST['nilai_angka'] : '';
$nilai_huruf = '';

// Proses konversi nilai angka ke nilai huruf saat formulir dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['konversi'])) {
    if ($nilai_angka >= 85) {
        $nilai_huruf = 'A';
    } elseif ($nilai_angka >= 70) {
        $nilai_huruf = 'B';
    } elseif ($nilai_angka >= 60) {
        $nilai_huruf = 'C';
    } elseif ($nilai_angka >= 50) {
        $nilai_huruf = 'D';
    } else {
        $nilai_huruf = 'E';
    }
}
?>

<script>
// Isi nilai_huruf dengan hasil konversi saat formulir dikirimkan
document.getElementById('nilai_huruf').value = '<?php echo $nilai_huruf; ?>';
</script>

</body>
</html>
