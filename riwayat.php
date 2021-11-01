<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION["pelanggan"])) {
	echo "<script> alert('Silahkan Login Terlebih Dahulu');</script>";
	echo "<script> location ='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Riwayat Reservasi</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="admin/assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
	 <link rel="icon" type="image/x-icon" href="admin/assets/img/logo aja.png">
</head>

<body>
	<?php include 'menu.php'; ?><br><br><br><br>
	<div class="row text-center ">
	<div class="col-md-12">
        <img class="imgSignUp" src="tema/list.jpg" alt="hotel" width="300" height="200">
	<h2 class="text-center"> Riwayat Belanja </h2>
	<h3 class="text-center"> Customer Hotel :  <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>
	<div class="mytabs text-center">
		<input type="radio" id="tabfree" name="mytabs" checked="checked">
		<label for="tabfree text-center"><i class="fa fa-clock"></i><br>Belum Bayar</label>
		<div class="tab">
			<table id="table" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kamar</th>
						<th>Tanggal Booking</th>
						<th>Tanggal Awal Menginap</th>
						<th>Tanggal Akhir Menginap</th>
						<th>Total</th>
						<th>Status</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor = 1;
					$id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
					$ambil = $koneksi->query("SELECT *FROM reservasi JOIN kamar
					ON reservasi.id_kamar=kamar.id_kamar WHERE id_pelanggan='$id_pelanggan' AND status_reservasi='Belum Bayar'");
					while ($pecah = $ambil->fetch_assoc()) { ?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $pecah["nama_kamar"] ?></td>
							<td><?php echo date("d F Y", strtotime($pecah['tanggal_reservasi'])) ?></td>
							<td><?php echo date("d F Y", strtotime($pecah['tanggalawal'])) ?></td>
							<td><?php echo date("d F Y", strtotime($pecah['tanggalakhir'])) ?></td>
							<td>Rp. <?php echo number_format($pecah["hargatotal"]); ?></td>
							<td><?php echo $pecah["status_reservasi"] ?></td>
							<td>
								<a href="nota.php?id=<?php echo $pecah["id_reservasi"] ?>" class="btn btn-info">Nota</a>
								<a href="pembayaran.php?id=<?php echo $pecah["id_reservasi"] ?>" class="btn btn-danger">Pembayaran</a>
								<a href="batal.php?id=<?php echo $pecah["id_reservasi"] ?>" class="btn btn-warning">Batal</a>
							</td>
						</tr>
						<?php $nomor++; ?>
					<?php  } ?>
				</tbody>
			</table>
		</div>

		<input type="radio" id="tablg" name="mytabs">
		<label for="tablg"><i class="fa fa-truck-loading"></i><br>Di Proses / Selesai</label>
		<div class="tab">
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
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor = 1;
					$id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
					$ambil = $koneksi->query("SELECT *FROM reservasi JOIN kamar
					ON reservasi.id_kamar=kamar.id_kamar WHERE id_pelanggan='$id_pelanggan' AND status_reservasi !='Belum Bayar'");
					while ($pecah = $ambil->fetch_assoc()) { ?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $pecah["nama_kamar"] ?></td>
							<td><?php echo date("d F Y", strtotime($pecah['tanggal_reservasi'])) ?></td>
							<td><?php echo date("d F Y", strtotime($pecah['tanggalawal'])) ?></td>
							<td><?php echo date("d F Y", strtotime($pecah['tanggalakhir'])) ?></td>
							<td>Rp. <?php echo number_format($pecah["hargatotal"]); ?></td>
							<td><?php echo $pecah["status_reservasi"] ?></td>
							<td>
								<a href="nota.php?id=<?php echo $pecah["id_reservasi"] ?>" class="btn btn-info">Nota</a>
								<a href="lihat_pembayaran.php?id=<?php echo $pecah["id_reservasi"] ?>" class="btn btn-success">Bukti</a>
							</td>
						</tr>
						<?php $nomor++; ?>
					<?php  } ?>
				</tbody>
			</table>
		</div>
	

		<script src="admin/assets/js/jquery.min.js"></script>
		<script src="admin/assets/js/bootstrap.bundle.min.js"></script>
		
       
    </div>

</body>

</html>

<style>
	h2 {
		padding: 10px;
		font-family : fantasy;
	}
	h3 {
		padding: 10px;
		font-family : Georgia;
		font-style : italic;
	}

	.mytabs {
		display: flex;
		flex-wrap: wrap;
		max-width: 1400px;
		margin: 50px auto;
		padding: 10px;
	}

	.mytabs input[type="radio"] {
		display: none;
	}

	.mytabs label {
		padding: 9px;
		color: #fff;
		background: #ff007f;
		font-weight: bold;
	}

	.mytabs .tab {
		width: 100%;
		padding: 4px;
		background: #fff;
		order: 1;
		display: none;
	}

	.mytabs input:hover+label {
		background: #3DC4B7;
		color: #ffffff;
		font-weight: normal;
	}

	.mytabs .tab h3 {
		font-size: 2em;
	}

	.mytabs input[type='radio']:checked+label+.tab {
		display: block;
	}

	.mytabs input[type="radio"]:checked+label {
		background: #000080;
	}
</style>