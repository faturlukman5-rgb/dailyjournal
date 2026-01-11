<?php
include 'koneksi.php';

$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$user = mysqli_query($conn,"SELECT * FROM users LIMIT $start,$limit");
$total = mysqli_query($conn,"SELECT * FROM users");
$total_page = ceil(mysqli_num_rows($total)/$limit);
?>

<h3>Manajemen User</h3>
<a href="user_tambah.php">+ Tambah User</a>

<table border="1" cellpadding="10">
<tr>
  <th>Nama</th>
  <th>Username</th>
  <th>Foto</th>
  <th>Aksi</th>
</tr>

<?php foreach($user as $u): ?>
<tr>
  <td><?= $u['name']; ?></td>
  <td><?= $u['username']; ?></td>
  <td><img src="img/user/<?= $u['photo']; ?>" width="80"></td>
  <td>
    <a href="user_hapus.php?id=<?= $u['id']; ?>">Hapus</a>
  </td>
</tr>
<?php endforeach; ?>
</table>

<?php for($i=1;$i<=$total_page;$i++): ?>
  <a href="?page=<?= $i ?>"><?= $i ?></a>
<?php endfor; ?>
