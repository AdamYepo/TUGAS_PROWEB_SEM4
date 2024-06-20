<?php
class Bola {
  private $jariJari;

  public function __construct($jariJari) {
    $this->jariJari = $jariJari;
  }

  public function hitungLuasPermukaan() {
    $luasPermukaan = 4 * M_PI * pow($this->jariJari, 2);
    return $luasPermukaan;
  }

  public function hitungVolume() {
    $volume = (4/3) * M_PI * pow($this->jariJari, 3);
    return $volume;
  }
}

if (isset($_POST['submit'])) {
  $jariJari = $_POST['jari_jari'];

  $bola = new Bola($jariJari);

  $luasPermukaan = $bola->hitungLuasPermukaan();
  $volume = $bola->hitungVolume();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hitung Luas dan Volume Bola</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Hitung Luas dan Volume Bola</h1>
  <form method="post">
    <label for="jari_jari">Jari-jari:</label>
    <input type="number" name="jari_jari" class="input" value="<?php echo $jariJari; ?>"><br>
    <br>
    <button type="submit" name="submit">Hitung</button>
  </form>

  <?php if (isset($_POST['submit'])) { ?>
    <h2>Hasil Perhitungan</h2>
    <p>Luas Permukaan: <?php echo number_format($luasPermukaan, 2); ?> satuan luas</p>
    <p>Volume: <?php echo number_format($volume, 2); ?> satuan kubik</p>
  <?php } ?>
</body>
</html>