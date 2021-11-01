<?php

$ambil =$koneksi->query("SELECT*FROM kamar WHERE id_kamar='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotokamar =$pecah['foto_kamar'];
if (file_exists("../foto_kamar/$fotokamar"))
{
	unlink("../foto_kamar/$fotokamar");
} 


$koneksi->query("DELETE FROM kamar WHERE id_kamar='$_GET[id]'");

echo "<script>alert('Kamar Berhasil Di Hapus');</script>";
echo "<script>location='index.php?halaman=kamar';</script>";
?>