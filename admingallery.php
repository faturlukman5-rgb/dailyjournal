<?php
include '../koneksi.php';

$limit = 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$data = mysqli_query($koneksi,
  "SELECT * FROM gallery LIMIT $start, $limit");
?>

<h2>Manajemen Gallery</h2>
<a href="gallery_tambah.php">+ Tambah Gallery</a>

<table border="1" cellpadding="10">
<tr>
  <th>No</th>
  <th>Judul</th>
  <th>Foto</th>
  <th>Aksi</th>
</tr>

<?php $no=$start+1; while($g=mysqli_fetch_assoc($data)){ ?>
<tr>
  <td><?= $no++ ?></td>
  <td><?= $g['judul'] ?></td>
  <td><img src="../uploads/gallery/<?= $g['foto'] ?>" width="80"></td>
  <td>
    <a href="gallery_edit.php?id=<?= $g['id'] ?>">Edit</a> |
    <a href="gallery_hapus.php?id=<?= $g['id'] ?>"
       onclick="return confirm('Hapus data?')">Hapus</a>
  </td>
</tr>
<?php } ?>
</table>

<?php
$total = mysqli_query($koneksi, "SELECT COUNT(*) FROM gallery");
$total_data = mysqli_fetch_array($total)[0];
$total_page = ceil($total_data / $limit);

for($i=1;$i<=$total_page;$i++){
  echo "<a href='?page=$i'> $i </a>";
}
?>
