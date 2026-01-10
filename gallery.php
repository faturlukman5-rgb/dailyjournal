<?php session_start(); include "koneksi.php"; include "upload_foto.php"; ?>
<div class="container">

<button class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
    <i class="bi bi-plus-lg"></i> Tambah Gallery
</button>

<div id="gallery_data"></div>

<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Gallery</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id">
          <input type="hidden" name="foto_lama">

          <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" required></textarea>
          </div>

          <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

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
  $tanggal=date("Y-m-d H:i:s");
  $user=$_SESSION['username'];
  $foto='';
  $nama=$_FILES['foto']['name'];

  if($nama!=''){
    $cek=upload_foto($_FILES['foto']);
    if($cek['status']) $foto=$cek['message'];
    else { echo "<script>alert('$cek[message]')</script>"; exit; }
  }

  if($_POST['id']!=''){
    $id=$_POST['id'];
    if($nama=='') $foto=$_POST['foto_lama'];
    else unlink("img/".$_POST['foto_lama']);

    $stmt=$conn->prepare("UPDATE gallery SET judul=?,keterangan=?,foto=?,tanggal=?,username=? WHERE id=?");
    $stmt->bind_param("sssssi",$judul,$ket,$foto,$tanggal,$user,$id);
  }else{
    $stmt=$conn->prepare("INSERT INTO gallery (judul,keterangan,foto,tanggal,username) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss",$judul,$ket,$foto,$tanggal,$user);
  }
  $stmt->execute();
  header("Location: admin.php?page=gallery");
}
?>
if(isset($_POST['hapus'])){
    $id   = $_POST['id'];
    $foto = $_POST['foto'];

    if($foto != ''){
        unlink("img/".$foto);
    }

    $stmt = $conn->prepare("DELETE FROM gallery WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();

    echo "<script>
        alert('Data gallery berhasil dihapus');
        document.location='admin.php?page=gallery';
    </script>";
}