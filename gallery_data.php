<?php
include "koneksi.php";
$limit=3;
$page=isset($_POST['hlm'])?(int)$_POST['hlm']:1;
$start=($page-1)*$limit;
$q=$conn->query("SELECT * FROM gallery ORDER BY id DESC LIMIT $start,$limit");
?>

<table class="table table-bordered">
<tr><th>No</th><th>Judul</th><th>Keterangan</th><th>Foto</th><th>Aksi</th></tr>
<?php $no=$start+1; while($r=$q->fetch_assoc()){ ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $r['judul'] ?></td>
<td><?= $r['keterangan'] ?></td>
<td><?php if($r['foto']!=''){ ?><img src="img/<?= $r['foto'] ?>" width="80"><?php } ?></td>
<td>
<form method="post" action="gallery.php">
<input type="hidden" name="id" value="<?= $r['id'] ?>">
<input type="hidden" name="foto" value="<?= $r['foto'] ?>">
<button name="hapus" class="btn btn-danger btn-sm">Hapus</button>
</form>
</td>
</tr>
<?php } ?>
</table>

<?php
$total=$conn->query("SELECT COUNT(*) c FROM gallery")->fetch_assoc()['c'];
$pages=ceil($total/$limit);
for($i=1;$i<=$pages;$i++){
  echo "<button class='btn btn-sm btn-secondary halaman' id='$i'>$i</button> ";
}
?>