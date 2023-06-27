<?php 
	$host = "us-cdbr-east-06.cleardb.net";
$user = "b7976c5d537010";
$pass = "e9865089";
$name = "heroku_8aaa86990959389";
// $host = "localhost";
// $user = "root";
// $pass = "";
// $name = "akademik";

$koneksi = mysqli_connect($host, $user, $pass, $name) or die("Koneksi ke database gagal");
mysqli_select_db($conn, $name) or die('Database is not found!');
	// $koneksi = mysqli_connect("localhost", "root", "", "akademik") or die("Gagal Koneksi Database");
	$id_matakuliahdiambil = $_GET['id_matakuliahdiambil'];
	$query="DELETE FROM matakuliahdiambil WHERE id_matakuliahdiambil='$id_matakuliahdiambil'";
	$sql = mysqli_query($koneksi,$query) or die("Gagal input:".$query);
	header("location:index.php");
?>