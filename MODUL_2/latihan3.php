<?php
class KonversiNilai {
  private $nilaiAngka;

  public function __construct($nilaiAngka) {
    $this->nilaiAngka = $nilaiAngka;
  }

  public function konversiNilaiHuruf() {
    if ($this->nilaiAngka >= 80) {
      $nilaiHuruf = 'A';
    } elseif ($this->nilaiAngka >= 75) {
      $nilaiHuruf = 'B+';
    } elseif ($this->nilaiAngka >= 70) {
      $nilaiHuruf = 'B';
    } elseif ($this->nilaiAngka >= 65) {
      $nilaiHuruf = 'C+';
    } elseif ($this->nilaiAngka >= 60) {
      $nilaiHuruf = 'C';
    } elseif ($this->nilaiAngka >= 55) {
      $nilaiHuruf = 'D+';
    } elseif ($this->nilaiAngka >= 50) {
      $nilaiHuruf = 'D';
    } else {
      $nilaiHuruf = 'E';
    }

    return $nilaiHuruf;
  }
}

if (isset($_POST['submit'])) {
  $nilaiAngka = $_POST['nilai_angka'];

  $konversiNilai = new KonversiNilai($nilaiAngka);

  $nilaiHuruf = $konversiNilai->konversiNilaiHuruf();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Konversi Nilai Angka ke Nilai Huruf</title>
  <link rel="stylesheet"href="style.css">
</head>
<body>
  <h1>Konversi Nilai Angka ke Nilai Huruf</h1>
  <form method="post">
    <label for="nilai_angka">Nilai Angka: </label>
    <input type="number" name="nilai_angka" class="input" value="<?php echo $nilaiAngka; ?>">
    <br>
    <br>
    <button type="submit" name="submit">Konversi</button>
  </form>

  <?php if (isset($_POST['submit'])) { ?>
    <h2>Hasil Konversi</h2>
    <p>Nilai Angka: <?php echo $nilaiAngka; ?></p>
    <p>Nilai Huruf: <?php echo $nilaiHuruf; ?></p>
  <?php } ?>
</body>
</html>