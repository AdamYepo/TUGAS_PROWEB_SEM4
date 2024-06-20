<!DOCTYPE html>
<html>
<head>
  <title>Kalkulator Sederhana</title>
  <style>
    form {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .input-container {
      display: flex;
      gap: 10px;
    }
    .operator-container {
      display: flex;
      gap: 10px;
    }
    .result-container {
      display: flex;
      gap: 10px;
    }
  </style>
</head>
<body>

<h2>Kalkulator Sederhana</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div class="input-container">
    <label for="angka1">Angka Pertama:</label>
    <input type="number" id="angka1" name="angka1" placeholder="Masukkan angka" required>
    <label for="angka2">Angka Kedua:</label>
    <input type="number" id="angka2" name="angka2" placeholder="Masukkan angka" required>
    <span>=</span>
    <input type="number" name="hasil" disabled> </div>
  </div>
  <div class="operator-container">
    <label>Pilih Operator:</label>
    <div>
      <input type="radio" id="tambah" name="operator" value="tambah" required>
      <label for="tambah">+</label>
    </div>
    <div>
      <input type="radio" id="kurang" name="operator" value="kurang">
      <label for="kurang">-</label>
    </div>
    <div>
      <input type="radio" id="kali" name="operator" value="kali">
      <label for="kali">x</label>
    </div>
    <div>
      <input type="radio" id="bagi" name="operator" value="bagi">
      <label for="bagi">/</label>
    </div>
  </div>
  <input type="submit" name="hitung" value="Hitung">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $angka1 = $_POST['angka1'];
  $angka2 = $_POST['angka2'];
  $operator = $_POST['operator'];
  $hasil = 0;

  switch ($operator) {
    case 'tambah':
      $hasil = $angka1 + $angka2;
      break;
    case 'kurang':
      $hasil = $angka1 - $angka2;
      break;
    case 'kali':
      $hasil = $angka1 * $angka2;
      break;
    case 'bagi':
      if ($angka2 != 0) {
        $hasil = $angka1 / $angka2;
      } else {
        echo "Error: Pembagian dengan angka 0 tidak diperbolehkan.";
      }
      break;
    default:
      echo "Operator tidak valid";
      break;
  }

  echo "<script>document.getElementsByName('hasil')[0].value = $hasil;</script>";
}
?>

</body>
</html>