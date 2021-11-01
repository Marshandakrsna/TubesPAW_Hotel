<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION["pelanggan"])) {
	echo "<script> alert('Silahkan Login Terlebih Dahulu');</script>";
	echo "<script> location ='login.php';</script>";
}
?>
<?php 
	include 'menu.php'; ?><br><br><br><br><br>
<?php
$id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
$ambil = $koneksi->query("SELECT *FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
$pecah = $ambil->fetch_assoc(); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Profil</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	 <link rel="icon" type="image/x-icon" href="admin/assets/img/logo aja.png" >
</head>

<body>
<br>
<br>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<table class="table">
					<tr>
						<th>Nama</th>
						<th><?php echo $pecah['nama_pelanggan'] ?></th>
					</tr>
					<tr>
						<th>Email</th>
						<th><?php echo $pecah['email_pelanggan'] ?></th>
					</tr>
					<tr>
						<th>Telepon</th>
						<th><?php echo $pecah['telepon_pelanggan'] ?></th>
					</tr>
					<tr>
						<th>Alamat</th>
						<th><?php echo $pecah['alamat'] ?></th>
					</tr>
				</table>
			</div>
			<div class="col-md-6">
				<img src="fotoprofil/<?php echo $pecah['fotoprofil'] ?>" width="150px">
			</div>
		</div>
	</div><br>
	<?php include 'ubahprofil.php'; ?>
</body>

</html>