<?php
session_start();
include 'koneksi.php';

?>
<?php include 'menu.php'; ?><br><br><br>

<!DOCTYPE html>
<html>

<head>
	<title>Nota Reservasi</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<script src="fontawesome/js/all.min.js"></script>
	<link rel="icon" type="image/x-icon" href="admin/assets/img/logo aja.png">
</head>

<body>

	<section class="konten">
		<div class="container">
			<br><br>
			<h2>Detail Reservasi</h2>
			<?php
			$ambil = $koneksi->query("SELECT*FROM reservasi JOIN pelanggan
			ON reservasi.id_pelanggan=pelanggan.id_pelanggan WHERE id_reservasi='$_GET[id]'");
			$detail = $ambil->fetch_assoc();
			?>

			<?php

			$idpelangganyangbeli = $detail["id_pelanggan"];

			$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

			?>

			<div class="row">
				<div class="col-md-4">
					<h3>Reservasi</h3>
					<strong>NO. RESERVASI: <?php echo $detail['id_reservasi']; ?></strong><br>
					<?php if (!empty($detail['resipengiriman'])) : ?> No Resi :
						<?php echo $detail['resipengiriman']; ?>
						<br><?php endif ?>
					Tanggal : <?php echo date("d F Y", strtotime($detail['tanggal_reservasi'])) ?><br>
					Total Bayar : Rp. <?php echo number_format($detail['hargatotal']); ?>
				</div>
				<div class="col-md-4">
					<h3>Pelanggan</h3>
					<strong> NAMA : <?php echo $detail['nama_pelanggan']; ?> </strong><br>
					Telepon : <?php echo $detail['telepon_pelanggan']; ?><br>
					Email : <?php echo $detail['email_pelanggan']; ?>

				</div>
			</div>
			<br><br>
			<table id="table1" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kamar</th>
						<th>Tanggal Booking</th>
						<th>Tanggal Awal Menginap</th>
						<th>Tanggal Akhir Menginap</th>
						<th>Total</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor = 1;
					$id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
					$ambil = $koneksi->query("SELECT *FROM reservasi JOIN kamar
					ON reservasi.id_kamar=kamar.id_kamar WHERE id_reservasi='$_GET[id]'");
					while ($pecah = $ambil->fetch_assoc()) { ?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $pecah["nama_kamar"] ?></td>
							<td><?php echo date("d F Y", strtotime($pecah['tanggal_reservasi'])) ?></td>
							<td><?php echo date("d F Y", strtotime($pecah['tanggalawal'])) ?></td>
							<td><?php echo date("d F Y", strtotime($pecah['tanggalakhir'])) ?></td>
							<td>Rp. <?php echo number_format($pecah["hargatotal"]); ?></td>
							<td><?php echo $pecah["status_reservasi"] ?></td>
						</tr>
						<?php $nomor++; ?>
					<?php  } ?>
				</tbody>
			</table>
			<?php if ($detail['status_reservasi'] == "Belum Bayar") : ?>
				<div class="row">
					<div class="col-md-7">
						<div class="alert alert-info">
							<p>
								Silahkan Melakukan Pembayaran Rp. <?php echo number_format($detail['hargatotal']); ?> Ke <br>
								<strong>BANK MANDIRI 123-86544-7655 AN. Syaliba Hotel</strong>
							</p>
						</div>
						<a href="pembayaran.php?id=<?php echo $detail["id_reservasi"] ?>" class="btn btn-danger">Pembayaran</a><br>
					</div>
				</div>
			<?php else : ?>
				<a href="cetak.php?id=<?php echo $detail['id_reservasi'] ?>"><button class="btn btn-success "><i class="fa fa-print"></i> Cetak</button></a>
			<?php endif ?>


		</div>

	</section>

</body>

</html>