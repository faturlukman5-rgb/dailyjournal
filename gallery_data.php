<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
include "koneksi.php";

echo "Koneksi OK<br>";
echo "DB: ".$conn->query("SELECT DATABASE()")->fetch_row()[0]."<br>";

$q = $conn->query("SELECT * FROM gallery");
if(!$q) die("Query error: ".$conn->error);

echo "Jumlah data gallery: ".$q->num_rows."<br><hr>";

while($r = $q->fetch_assoc()){
  echo $r['id']." | ".$r['judul']." | ".$r['keterangan']." | ".$r['foto']."<br>";
}
?>