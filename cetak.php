<?php
session_start();
ob_start();
include 'koneksi.php';
if (!isset($_SESSION["pelanggan"]))
?>

<!DOCTYPE html>
<html>

<head>
	<title>Nota Reservasi</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>

<body>

	<section class="konten">
		<div class="container">
			<h2>Detail Reservasi</h2>
			<?php
				$ambil = $koneksi->query("SELECT*FROM reservasi JOIN pelanggan
				ON reservasi.id_pelanggan=pelanggan.id_pelanggan WHERE id_reservasi='$_GET[id]'");
				$detail = $ambil->fetch_assoc();
			?>

			<?php
				$idpelangganyangbeli = $detail["id_pelanggan"];
				$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];
				if ($idpelangganyangbeli !== $idpelangganyanglogin) {
					echo "<script> alert('Gagal');</script>";
					echo "<script> location ='riwayat.php';</script>";
				}
			?>

			<div class="row">
				<div class="col-md-4">
					<?php
					if ($detail["status_reservasi"] == "Pembayaran Anda Telah Di Terima, Silahkan ke Hotel pada Hari Kedatangan Anda") {
						$status = "Telah Bayar dan Telah Di Setujui";
					} else {
						$status = $detail["status_reservasi"];
					}
					?>
					<h3>Status Pembayaran : <?php echo $status ?></h3>
					<strong>NO. RESERVASI: <?php echo $detail['id_reservasi']; ?></strong><br>
					<?php if (!empty($detail['resipengiriman'])) : ?> No Resi :
						<?php echo $detail['resipengiriman']; ?>
						<br><?php endif ?>
					Tanggal : <?php echo date("d F Y", strtotime($detail['tanggal_reservasi'])) ?><br>
					Total Bayar : Rp. <?php echo number_format($detail['hargatotal']); ?>
				</div>
				<div class="col-md-4">
					<h3>Pelanggan</h3>
					<strong> 
						NAMA : <?php echo $detail['nama_pelanggan']; ?> </strong><br>
						Telepon : <?php echo $detail['telepon_pelanggan']; ?><br>
						Email : <?php echo $detail['email_pelanggan']; ?>

				</div>
			</div><br>
			<table id="table1" class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kamar</th>
						<th>Tanggal Booking</th>
						<th>Tanggal Awal Menginap</th>
						<th>Tanggal Akhir Menginap</th>
						<th>Total</th>
						
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
						</tr>
						<?php $nomor++; ?>
					<?php  } ?>
				</tbody>
			</table>
	</section>

</body>

</html>
<?php
	$isi = ob_get_clean();
	require_once "./admin/assets/mpdf_v8.0.3-master/vendor/autoload.php";
	$mpdf = new \Mpdf\Mpdf();
	$mpdf->AddPage("L", "", "", "", "", "5", "5", "5", "5", "", "", "", "", "", "", "", "", "", "", "", "A4");
	$mpdf->WriteHTML($isi);
	$mpdf->Output();
?>