<h2>Data Pembayaran</h2>

<?php
	$id_reservasi = $_GET['id'];
	$ambil = $koneksi->query("SELECT*FROM pembayaran WHERE id_reservasi='$id_reservasi'");
	$detail = $ambil->fetch_assoc();
?>

<?php 
	$am = $koneksi->query("SELECT*FROM reservasi WHERE id_reservasi='$id_reservasi'");
	$det = $am->fetch_assoc(); ?>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr><br>
				<th>Nama</th>
				<th><?php echo $detail['nama'] ?></th>
			</tr>
			<tr>
				<th>Bank</th>
				<th><?php echo $detail['bank'] ?></th>
			</tr>
			<tr>
				<th>Jumlah</th>
				<th><?php echo number_format($detail['jumlah']); ?></th>
			</tr>
			<tr>
				<th>Tanggal</th>
				<th><?php echo $detail['tanggal'] ?></th>
			</tr>
			<?php if (!empty($det['resipengiriman'])) : ?>
				<tr>
					<th>Resi Pengiriman</th>
					<th><?php echo $det['resipengiriman'] ?></th>
				</tr>
			<?php else : ?>
			<?php endif ?>

		</table>
		<form method="post">
			<button class=" btn btn-primary" name="proses">Setujui</button>
			<br><br>
			<i class="text-danger">Abaikan Jika Bukti Pembayaran Palsu</i>
		</form>
	</div>
	<div class="col-md-6">
		<img src="../buktipembayaran/<?php echo $detail['bukti'] ?>" alt="" class="img-responsive">
	</div>
</div>

<?php
if (isset($_POST["proses"])) {
	$koneksi->query("UPDATE reservasi SET status_reservasi='Pembayaran Anda Telah Di Terima, Silahkan ke Hotel pada Hari Kedatangan Anda'
		WHERE id_reservasi='$id_reservasi'");
	echo "<script>alert('Pembayaran Berhasil Diupdate')</script>";
	echo "<script>location='index.php?halaman=reservasi';</script>";
} ?>