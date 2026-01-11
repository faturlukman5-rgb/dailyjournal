<form method="post" enctype="multipart/form-data">
<input name="title" placeholder="Judul"><br>
<textarea name="description" placeholder="Deskripsi"></textarea><br>
<input type="file" name="image"><br>
<button name="simpan">Simpan</button>
</form>

<?php
include 'koneksi.php';
if(isset($_POST['simpan'])){
  $title=$_POST['title'];
  $desc=$_POST['description'];
  $img=$_FILES['image']['name'];

  move_uploaded_file($_FILES['image']['tmp_name'],
    "img/gallery/".$img);

  mysqli_query($conn,
   "INSERT INTO gallery VALUES
   (NULL,'$title','$desc','$img',NOW())");
  header("location:gallery.php");
}
?>
