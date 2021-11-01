<?php 
session_start();
include 'koneksi.php';
if (!isset($_SESSION["pelanggan"])) 
{
	echo "<script> alert('Silahkan Login Terlebih Dahulu');</script>";
	echo "<script> location ='login.php';</script>";
	exit();
}
$idpem=$_GET["id"];
$ambil=$koneksi->query("SELECT*FROM reservasi WHERE id_reservasi='$idpem'");
$detpem=$ambil->fetch_assoc();

$id_pelanggan_beli = $detpem["id_pelanggan"];
$id_pelanggan_login=$_SESSION["pelanggan"]["id_pelanggan"];
if ($id_pelanggan_login !==$id_pelanggan_beli) 
{
	echo "<script> alert('Gagal');</script>";
	echo "<script> location ='riwayat.php';</script>";
}

?>
<?php include 'menu.php'; ?><br><br><br><br>
<!DOCTYPE html>
<html>
<head>
	<title>Pembayaran Belanja</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="icon" type="image/x-icon" href="admin/assets/img/logo aja.png" >
</head>
<body>
	<div class="container">
		<h2>Konfirmasi Pembayaran</h2>
		<p>Kirim Bukti Pembayaran</p>
		<div class="alert alert-info">Total Tagihan Anda <strong>Rp. <?php echo number_format($detpem["hargatotal"]) ?></strong></div>

		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label >Nama Penyetor</label>
				<input type="text" name="nama" class="form-control" required>
				
			</div>
			<div class="form-group">
				<label >Bank</label>
				
				<input type="text" name="bank" class="form-control" required>
			
			</div>
			<div class="form-group">
				<label >Jumlah</label>
				<input type="number" name="jumlah" min="1" class="form-control" required>
				
			</div>
			<div class="form-group">
				<label >Foto Bukti</label>
				<input type="file" name="bukti" class="form-control" required>
				<p class="text-danger">Foto Bukti Jpg, Max 1 MB</p>
			</div>
			<button class="btn btn-primary" name="kirim">Kirim</button>
		</form>
	</div>
<?php  
if (isset($_POST["kirim"]))
{
	$namabukti =$_FILES["bukti"]["name"];
	$lokasibukti=$_FILES["bukti"]["tmp_name"];
	$namafix=date("YmdHis").$namabukti;
	move_uploaded_file($lokasibukti, "buktipembayaran/$namafix");

	$nama =$_POST["nama"];
	$bank =$_POST["bank"];
	$jumlah =$_POST["jumlah"];
	$tanggal = date("Y-m-d");


	$koneksi->query("INSERT INTO pembayaran(id_reservasi, nama, bank, jumlah, tanggal, bukti)
		VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafix')");

	$koneksi->query("UPDATE reservasi SET status_reservasi='sudah kirim'
		WHERE id_reservasi='$idpem'");
	echo "<script> alert('Bukti Pembayaran Anda Telah Di Upload, Silahkan Tunggu Konfirmasi Admin');</script>";
}
?>

</body>
</html>