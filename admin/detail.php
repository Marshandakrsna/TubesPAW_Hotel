<h2>Detail Reservasi</h2>
<?php
$ambil = $koneksi->query("SELECT*FROM reservasi JOIN pelanggan
	ON reservasi.id_pelanggan=pelanggan.id_pelanggan
	WHERE reservasi.id_reservasi='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<div class="row">
	<div class="col-md-4">
		<h3>Reservasi</h3>
		<strong>
			NO RESERVASI: 
				<?php echo $detail['id_reservasi']; ?></strong><br>
			Tanggal : 
				<?php echo $detail['tanggal_reservasi']; ?><br>
			Status Pemesanan : 
				<?php echo $detail['status_reservasi']; ?><br>
			Total Bayar : Rp. 
				<?php echo number_format($detail['hargatotal']); ?>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong>
			NAMA : 
				<?php echo $detail['nama_pelanggan']; ?></strong><br>
			Telepon : 
				<?php echo $detail['telepon_pelanggan']; ?><br>
			Email : 
				<?php echo $detail['email_pelanggan']; ?>
	</div>
</div>
<br><br>
<table id="table1" class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Kamar</th>
			<th>Tanggal Booking</th>
			<th>Check IN</th>
			<th>Check OUT</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1;
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