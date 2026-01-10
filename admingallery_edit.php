<?php
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi,
  "SELECT * FROM gallery WHERE id='$id'");
$g = mysqli_fetch_assoc($data);
?>

<h2>Edit Gallery</h2>

<form action="gallery_proses.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $g['id'] ?>">

  Judul<br>
  <input type="text" name="judul" value="<?= $g['judul'] ?>"><br><br>

  Foto (kosongkan jika tidak ganti)<br>
  <input type="file" name="foto"><br><br>

  <button type="submit" name="edit">Update</button>
</form>

