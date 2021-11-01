<?php 
	session_start();
	include 'koneksi.php';
	$id_reservasi=$_GET["id"];
	
	$koneksi->query("DELETE FROM reservasi WHERE id_reservasi='$id_reservasi'");
	echo "<script>alert('batal');</script>";
	echo "<script>location='riwayat.php';</script>";
?>

