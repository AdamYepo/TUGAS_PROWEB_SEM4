<?php
class Balok {
  private $panjang;
  private $lebar;
  private $tinggi;

  public function __construct($panjang, $lebar, $tinggi) {
    $this->panjang = $panjang;
    $this->lebar = $lebar;
    $this->tinggi = $tinggi;
  }

  public function hitungLuasPermukaan() {
    $luasPermukaan = 2 * ($this->panjang * $this->lebar + $this->panjang * $this->tinggi + $this->lebar * $this->tinggi);
    return $luasPermukaan;
  }

  public function hitungVolume() {
    $volume = $this->panjang * $this->lebar * $this->tinggi;
    return $volume;
  }
}

if (isset($_POST['submit'])) {
  $panjang = $_POST['panjang'];
  $lebar = $_POST['lebar'];
  $tinggi = $_POST['tinggi'];

  $balok = new Balok($panjang, $lebar, $tinggi);

  $luasPermukaan = $balok->hitungLuasPermukaan();
  $volume = $balok->hitungVolume();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hitung Luas dan Volume Balok</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Hitung Luas dan Volume Balok</h1>
  <form method="post">
    <label for="panjang">Panjang:</label>
    <input type="number" name="panjang" class="input" value="<?php echo $panjang ?>">
    <br>
    <label for="lebar">Lebar:</label>
    <input type="number" name="lebar" class="input" value="<?php echo $lebar ?>">
    <br>
    <label for="tinggi">Tinggi:</label>
    <input type="number" name="tinggi" class="input" value="<?php echo $tinggi ?>">
    <br>
    <br>
    <button type="submit" name="submit">Hitung</button>
  </form>

  <?php if (isset($_POST['submit'])) { ?>
    <h2>Hasil Perhitungan</h2>
    <p>Luas Permukaan: <?php echo $luasPermukaan; ?></p>
    <p>Volume: <?php echo $volume; ?></p>
  <?php } ?>
</body>
</html>