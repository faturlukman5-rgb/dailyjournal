<?php
if(isset($_POST['simpan'])){
  $judul = $_POST['judul'];
  $ket = $_POST['keterangan'];
  $tanggal = date("Y-m-d H:i:s");
  $user = $_SESSION['username'] ?? 'admin';
  $foto = '';
  $nama = $_FILES['foto']['name'];

  if($nama != ''){
    $cek = upload_foto($_FILES['foto']);
    if($cek['status']) $foto = $cek['message'];
    else { echo "<script>alert('".$cek['message']."')</script>"; exit; }
  }

  if($_POST['id'] != ''){
    $id = $_POST['id'];
    if($nama == '') $foto = $_POST['foto_lama'];
    else if($_POST['foto_lama']!='') unlink("img/".$_POST['foto_lama']);

    $stmt = $conn->prepare("UPDATE gallery SET judul=?,keterangan=?,foto=?,tanggal=?,username=? WHERE id=?");
    $stmt->bind_param("sssssi",$judul,$ket,$foto,$tanggal,$user,$id);
  } else {
    $stmt = $conn->prepare("INSERT INTO gallery (judul,keterangan,foto,tanggal,username) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss",$judul,$ket,$foto,$tanggal,$user);
  }

  $stmt->execute();
  header("Location: admin.php?page=gallery");
  exit;
}

if(isset($_POST['hapus'])){
  $id = $_POST['id'];
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
?>