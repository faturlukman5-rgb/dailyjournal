<?php
session_start();
include "koneksi.php";
include "upload_foto.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Manajemen Gallery</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-4">
<button class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Gallery</button>
<div id="gallery_data"></div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1">
<div class="modal-dialog"><div class="modal-content">
<form method="post" action="gallery.php" enctype="multipart/form-data">
<div class="modal-header"><h5 class="modal-title">Tambah Gallery</h5></div>
<div class="modal-body">
<input type="hidden" name="id">
<input type="hidden" name="foto_lama">
<input name="judul" class="form-control mb-2" placeholder="Judul" required>
<textarea name="keterangan" class="form-control mb-2" placeholder="Keterangan" required></textarea>
<input type="file" name="foto" class="form-control">
</div>
<div class="modal-footer">
<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
</div>
</form>
</div></div></div>

<script>
$(document).ready(function(){
  load_data();
  function load_data(hlm){
    $.post("gallery_data.php",{hlm:hlm},function(data){
      $("#gallery_data").html(data);
    });
  }
  $(document).on('click','.halaman',function(){
    load_data($(this).attr("id"));
  });
});
</script>

<?php
if(isset($_POST['simpan'])){
  $judul=$_POST['judul'];
  $ket=$_POST['keterangan'];
  $tgl=date("Y-m-d H:i:s");
  $user=$_SESSION['username'] ?? 'admin';
  $foto='';
  if($_FILES['foto']['name']!=''){
    $up=upload_foto($_FILES['foto']);
    if($up['status']) $foto=$up['message'];
    else die($up['message']);
  }
  $stmt=$conn->prepare("INSERT INTO gallery(judul,keterangan,foto,tanggal,username) VALUES(?,?,?,?,?)");
  $stmt->bind_param("sssss",$judul,$ket,$foto,$tgl,$user);
  $stmt->execute();
  header("Location: gallery.php");
}

if(isset($_POST['hapus'])){
  $id=$_POST['id'];
  $foto=$_POST['foto'];
  if($foto!='') unlink("img/".$foto);
  $conn->query("DELETE FROM gallery WHERE id=$id");
  header("Location: gallery.php");
}
?>
</body>
</html>