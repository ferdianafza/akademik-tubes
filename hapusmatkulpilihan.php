<?php 
	$koneksi = mysqli_connect("localhost", "root", "", "akademik") or die("Gagal Koneksi Database");
	$id_matakuliahdiambil = $_GET['id_matakuliahdiambil'];
	$query="DELETE FROM matakuliahdiambil WHERE id_matakuliahdiambil='$id_matakuliahdiambil'";
	$sql = mysqli_query($koneksi,$query) or die("Gagal input:".$query);
	header("location:index.php");
?>