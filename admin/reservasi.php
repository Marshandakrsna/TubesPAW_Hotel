<h2>Daftar Reservasi</h2>

<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Tanggal Reservasi</th>
			<th>Total Reservasi</th>
			<th>Status Reservasi</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM reservasi JOIN pelanggan ON reservasi. id_pelanggan=pelanggan.id_pelanggan "); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) { ?>
			<?php
			if ($pecah["status_reservasi"] == "Pembayaran Anda Telah Di Terima, Silahkan ke Hotel pada Hari Kedatangan Anda") {
				$status = "Telah Bayar dan Telah Di Setujui";
			} else {
				$status = $pecah["status_reservasi"];
			}
			?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['nama_pelanggan'] ?></td>
				<td><?php echo date("d F Y", strtotime($pecah['tanggal_reservasi'])) ?></td>
				<td>Rp. <?php echo number_format($pecah['hargatotal']) ?></td>
				<td><?php echo $status ?></td>
				<td>
					<a href="index.php?halaman=detail&id=<?php echo $pecah['id_reservasi'] ?>" class="btn btn-info">Detail</a>
					<?php if ($pecah['status_reservasi'] !== "pending") : ?>
						<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_reservasi'] ?>" class="btn btn-success">Pembayaran</a>
					<?php endif ?>
				</td>
			</tr>
			<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>