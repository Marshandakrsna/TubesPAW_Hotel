<h2>Daftar Kamar</h2>

<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Kategori</th>
			<th>Harga</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM kamar LEFT JOIN kategori ON kamar.id_kategori=kategori.id_kategori"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $pecah['nama_kamar']?></td>
			<td><?php echo $pecah['nama_kategori']?></td>
			<td><?php echo $pecah['harga_kamar']?></td>
			<td>
				<img src="../foto_kamar/<?php echo $pecah['foto_kamar']?>" width="100px">
			</td>
			<td>
				<a 
					href="index.php?halaman=hapuskamar&id=
					<?php echo $pecah['id_kamar'];?>" 
					class= "btn btn-danger" 
					onclick="return confirm('Yakin Mau di Hapus?')">Hapus</a>
				<a 
					href="index.php?halaman=ubahkamar&id=
					<?php echo $pecah['id_kamar'];?>" 
					class= "btn btn-warning">Edit</a>
			</td>
		</tr>
		<?php $nomor++;?>
		<?php }?>
	</tbody>
</table>
<a href="index.php?halaman=tambahkamar" class="btn btn-primary">Tambah Kamar</a>