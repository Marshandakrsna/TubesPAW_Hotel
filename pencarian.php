<style type="text/css">
	.col-md-3{
		position: relative;
		margin:0 auto;
		overflow: hidden;
	}
	.tumbnail{
		position: absolute;
		top: 0;
		left: 0;
	}
	.thumbnail img{
		padding: 10px;
		-webkit-transition:0.4 ease;
		transition: 0.4 ease;
	}
	.col-md-3:hover .thumbnail img{
		-webkit-transform:scale(1.36);
		transform: scale(1.36);
	}
	
</style>
<?php 
	session_start();
	include 'koneksi.php';
	$keyword = $_GET["keyword"];
	$semuadata=array();
	$ambil=$koneksi->query("SELECT*FROM kamar WHERE nama_kamar LIKE '%$keyword%'
		OR deskripsi_kamar LIKE '%$keyword%'");
	WHILE($pecah=$ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
?>
<?php
	$datakategori=array();
	$ambil= $koneksi->query("SELECT * FROM kategori");
	while($tiap=$ambil->fetch_assoc())
	{
		$datakategori[]=$tiap;
	}
?>
<?php include 'menu.php'; ?><br><br><br><br><br>
<?php include 'buttonup.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pencarian</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="icon" type="image/x-icon" href="admin/assets/img/logo aja.png" >
</head>
<body>
	<div class="container">
		<form action="pencarian.php" method="get" class="navbar-form navbar-right">
			<input type="text" class="form-control" name="keyword" placeholder="Cari Kamar">
			<button class="btn btn-primary"><i class="fas fa-search"></i></button>
		</form>
		<form method="get" class="navbar-form navbar-right">
			<select class="form-control" name="kategori" onchange="document.location.href= this.options[this.selectedIndex].value;">
	 			<option value="">Pilih Kategori</option>
	 			<?php foreach ($datakategori as $key => $value): ?>
	 			<option value="kategori.php?id=<?php echo $value["id_kategori"] ?>" value="<?php echo $value["id_kategori"] ?>" ><?php echo $value["nama_kategori"] ?> </option>
	 			<?php endforeach ?>
 			</select>
		</form><br>
		<h3>Hasil Pencarian : <?php echo $keyword ?></h3>
		<br>
		<?php if (empty($semuadata)): ?>
			<div class="alert alert-danger">Kamar <strong><?php echo $keyword ?></strong> Tidak Ditemukan</div>	
		<?php endif ?>
		<div class="row">
			<?php foreach ($semuadata as $key => $value): ?>
				<div class="col-md-4">
					<div class="thumbnail">
						<div class="text-center" style="padding:10%;">
							<img class="text-center img-fluid" src="foto_kamar/<?php echo $value['foto_kamar'] ?>" width="200px" height="200px" alt="">
							<h5><?php echo $value['nama_kamar'] ?></h5>
							<h5>Rp <?php echo number_format($value['harga_kamar']) ?></h5>
							<hr>
							<a href="detail.php?id=<?php echo $value['id_kamar']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart fa-sm"></i> Booking Kamar</a>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>

</body>
</html>