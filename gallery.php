<?php
include 'koneksi.php';

$limit = 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$data = mysqli_query($conn,"SELECT * FROM gallery LIMIT $start,$limit");
$total = mysqli_query($conn,"SELECT * FROM gallery");
$total_page = ceil(mysqli_num_rows($total)/$limit);
?>

<h3>Manajemen Gallery</h3>
<a href="gallery_tambah.php">+ Tambah Gallery</a>

<table border="1" cellpadding="10">
<tr>
  <th>Judul</th>
  <th>Gambar</th>
  <th>Aksi</th>
</tr>

<?php foreach($data as $g): ?>
<tr>
  <td><?= $g['title']; ?></td>
  <td><img src="img/gallery/<?= $g['image']; ?>" width="120"></td>
  <td>
    <a href="gallery_edit.php?id=<?= $g['id']; ?>">Edit</a> |
    <a href="gallery_hapus.php?id=<?= $g['id']; ?>">Hapus</a>
  </td>
</tr>
<?php endforeach; ?>
</table>

<?php for($i=1;$i<=$total_page;$i++): ?>
  <a href="?page=<?= $i ?>"><?= $i ?></a>
<?php endfor; ?>
