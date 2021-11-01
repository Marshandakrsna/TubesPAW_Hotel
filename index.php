<style type="text/css">
	.share {
		position: fixed;
		height: 45px;
		width: 42px;
		left: 1px;
		bottom: 300px;
		z-index: 9999;
	}
</style>

<?php
	session_start();
	include 'koneksi.php';
?>

<?php
	$datakategori = array();
	$ambil = $koneksi->query("SELECT * FROM kategori");
	while ($tiap = $ambil->fetch_assoc()) {
		$datakategori[] = $tiap;
	}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Syaliba Hotel</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	 <link rel="icon" type="image/x-icon" href="admin/assets/img/logo aja.png" >
</head>

<body>
	<section class="konten">
		<?php include 'menu.php'; ?><br><br><br>
		<?php include 'buttonup.php'; ?>
		<div class="container"><br>
			<br>
			<form action="pencarian.php" method="get" class="navbar-form navbar-right">
				<input type="text" class="form-control" name="keyword" placeholder="Cari Kamar">
				<button class="btn btn-primary"><i class="fas fa-search"></i></button>
			</form>
			<form method="get" class="navbar-form navbar-right">
				<select class="form-control" name="kategori" onchange="document.location.href= this.options[this.selectedIndex].value;">
					<option value="">Pilih Kategori</option>
					<?php foreach ($datakategori as $key => $value) : ?>
						<option value="kategori.php?id=<?php echo $value["id_kategori"] ?>" value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?> </option>
					<?php endforeach ?>
				</select>
			</form>
			<?php include 'kamar.php'; ?><br>

		</div>
		<?php include 'footer.php'; ?>

	</section>

</body>

</html>