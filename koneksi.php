<?php
date_default_timezone_set('Asia/Jakarta');

$servername = "sql113.infinityfree.com";
$username = "if0_40809784";
$password = "Q7teyfKC7vS6wG";
$db = "if0_40809784_webdailyjournal"; //nama database

//create connection
$conn = new mysqli($servername,$username,$password,$db);

//check apakah ada error connection
if($conn->connect_error){
	//jika ada, hentikan script dan tampilkan pesan error
	die("Connection failed : ".$conn->connect_error);
}
//echo "Connected successfully<hr>";
?>