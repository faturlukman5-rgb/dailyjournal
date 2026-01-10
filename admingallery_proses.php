<?php
include '../koneksi.php';

if(isset($_POST['tambah'])){
  $judul = $_POST['judul'];
  $foto = $_FILES['foto']['name'];

  move_uploaded_file($_FILES['foto']['tmp_name'],
    "../uploads/gallery/".$foto);

  mysqli_query($koneksi,
    "INSERT INTO gallery (judul, foto)
     VALUES ('$judul','$foto')");

  header("location:gallery.php");
}

if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $judul = $_POST['judul'];

  if($_FILES['foto']['name'] != ""){
    $foto = $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'],
      "../uploads/gallery/".$foto);

    mysqli_query($koneksi,
      "UPDATE gallery SET judul='$judul', foto='$foto'
       WHERE id='$id'");
  } else {
    mysqli_query($koneksi,
      "UPDATE gallery SET judul='$judul'
       WHERE id='$id'");
  }

  header("location:gallery.php");
}
