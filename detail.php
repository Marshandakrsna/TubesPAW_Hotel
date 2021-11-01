<style type="text/css">
	* {
		margin: 0;
		padding: 0;
	}

	img {
		max-width: 100%;
	}
</style>

<?php session_start(); ?>
<?php include 'koneksi.php'; ?>

<?php

$id_kamar = $_GET["id"];
$ambil = $koneksi->query("SELECT*FROM kamar WHERE id_kamar='$id_kamar'");
$detail = $ambil->fetch_assoc();
$kategori = $detail["id_kategori"];
?>
<?php
	$data = array();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Detail Kamar</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
	<?php include 'menu.php'; ?><br><br><br>
	<?php include 'buttonup.php'; ?>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v8.0" nonce="x8IbXLrR"></script>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<img width="600px" class="" src="foto_kamar/<?php echo $detail["foto_kamar"]; ?>" id="myimage">
				<script type="text/javascript" src="slider.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
				<script src="admin/assets/js/bootstrap.min.js"></script>
				<script src="admin/assets/js/jquery.min.js"></script>
			</div>
			<div class="col-md-4">
				<h1><?php echo $detail["nama_kamar"] ?></h1>
				<h5>Rp. <?php echo number_format($detail["harga_kamar"]); ?></h5>
				<h5><? echo $detail['nama_kamar'] ?></h5>
				<hr>
				<h3>Deskripsi Kamar</h3>
				<?php echo $detail["deskripsi_kamar"]; ?>
				<br>
				<form method="post">
					<div class="input-group">
						<label>Tanggal Awal</label>
						<input type="date" class="form-control" name="tanggalawal" required></input><br> <br>
						<br><br>
						<label>Tanggal Akhir</label>
						<input type="date" class="form-control" name="tanggalakhir" required></input><br> <br>
						<br><br>
						<div class="input-group-button">
							<button class="btn btn-primary btn-block" name="beli"><i class="fa fa-shopping-cart"></i> Booking Kamar</button>
						</div>
					</div>
				</form>
				<?php
				if (isset($_POST["beli"])) {
					if (!isset($_SESSION["pelanggan"])) {
						echo "<script> alert('Silahkan Login Terlebih Dahulu');</script>";
						echo "<script> location ='login.php';</script>";
					}
					$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
					$tanggal_reservasi = date("Y-m-d");
					$id_kamar = $detail["id_kamar"];
					$tanggalawal = $_POST["tanggalawal"];
					$tanggalakhir = $_POST["tanggalakhir"];
					$date1 = new DateTime($tanggalawal);
					$date2 = new DateTime($tanggalakhir);
					$interval = $date1->diff($date2);
					$hargatotal = $interval->days * $detail["harga_kamar"];
					//penyimpan data reservasi
					$koneksi->query(
						"INSERT INTO reservasi(
						id_pelanggan, id_kamar, tanggal_reservasi, tanggalawal, tanggalakhir, hargatotal)
						VALUES('$id_pelanggan', '$id_kamar', '$tanggal_reservasi', '$tanggalawal', '$tanggalakhir', '$hargatotal')"
					);

					echo "<script> alert('Reservasi Sukses');</script>";
					echo "<script> location ='riwayat.php';</script>";
				}
				?>
			</div>
			<div class="col-md-4">
				<br>
				<?php

				if (empty($_SESSION['keranjang']) or !isset($_SESSION["keranjang"])) : ?>

				<?php else : ?>
					<?php include 'modal.php'; ?><br>
				<?php endif ?>
				<div class="sellers">
					<h4>Kategori Kamar</h4>
					<table class="table table-dark">
						<tbody>
							<?php
							$sqlkat = $koneksi->query("SELECT*FROM kategori");
							while ($rev = $sqlkat->fetch_array()) {
							?>
								<tr class="table-danger">
									<td><a href="kategori.php?id=<?php echo $rev['id_kategori'] ?>"><?= $rev['nama_kategori'] ?></a></td>
								</tr>

							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>


		<div class="clear"></div>
	</div>
	</div>
</body>

</html>