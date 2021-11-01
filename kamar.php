<style type="text/css">
	.col-md-3 {
		position: relative;
		margin: 0 auto;
		overflow: hidden;
	}

	.tumbnail {
		position: absolute;
		top: 0;
		left: 0;
	}

	.thumbnail img {
		padding: 1px;
		-webkit-transition: 0.4 ease;
		transition: 0.4 ease;
	}

	.col-md-3:hover .thumbnail img {
		-webkit-transform: scale(1.36);
		transform: scale(1.36);
	}
</style>
<h1>List Kamar Hotel</h1><br>

<div class="row">
	<?php $ambil = $koneksi->query("SELECT *FROM kamar"); ?>
	<?php while ($perkamar = $ambil->fetch_assoc()) { ?>
		<div class="col-md-4">
			<div class="thumbnail">
				<div class="text-center" style="padding:10%;">
					<img class="text-center img-fluid" src="foto_kamar/<?php echo $perkamar['foto_kamar'] ?>" width="200px" height="200px" alt="">
					<h5><?php echo $perkamar['nama_kamar'] ?></h5>
					<h5>Rp <?php echo number_format($perkamar['harga_kamar']) ?></h5>
					<hr>
					<a href="detail.php?id=<?php echo $perkamar['id_kamar']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart fa-sm"></i> Booking Kamar</a>
				</div>
			</div>
		</div>
	<?php } ?>

</div>