<h2>Ubah Kamar</h2>
<?php 
	$ambil = $koneksi->query("SELECT * FROM kamar WHERE id_kamar='$_GET[id]'");
	$pecah = $ambil->fetch_assoc();
?>
<?php
	$datakategori=array();
	$ambil= $koneksi->query("SELECT * FROM kategori");
	while($tiap=$ambil->fetch_assoc())
	{
		$datakategori[]=$tiap;
	}
?>

 <form method="post" enctype="multipart/form-data">
 	
 	<div class="form-group">
 		<label>Nama Kamar</label>
 		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_kamar'];?>">
 	</div>
 	<div class="form-group">
 		<label>Nama Kategori</label>
 		<select class="form-control" name="id_kategori">
 			<option value="">Pilih Kategori</option>
 			<?php foreach ($datakategori as $key => $value): ?>

 			<option value="<?php echo $value["id_kategori"] ?>" <?php if($pecah["id_kategori"]==$value["id_kategori"]) {echo "selected";}?>><?php echo $value["nama_kategori"] ?></option>
 			<?php endforeach ?>
 		</select>
 	</div>

 	<div class="form-group">
 		<label>Harga Per Hari</label>
 		<input 
		 	type="number" 
			name="harga" 
			class="form-control" 
			value="<?php echo $pecah['harga_kamar']; ?>" >
 	</div>
 	<div class="form-group">

 		<img src="../foto_kamar/<?php echo $pecah['foto_kamar']; ?>" width="200">

 	</div>

 	<div class="form-group">
		<label> Ganti Foto</label>
		<input 
			type="file" 
			class="form-control" 
			name="foto">
	</div>
 	
 	<div class="form-group">
 		<label>Deskripsi</label>
 		<textarea 
		 	name="deskripsi" 
			class="form-control" 
			id="deskripsi" 
			rows="10">
 			<?php  echo $pecah ['deskripsi_kamar']; ?>
 		</textarea>
 	</div>
 	<button class="btn btn-primary" name="ubah">Ubah</button>
 	<script>
                CKEDITOR.replace( 'deskripsi' );
        </script>
 </form>

 <?php  
 if (isset($_POST['ubah'])){

 	$namafoto=$_FILES['foto']['name'];
 	$lokasifoto=$_FILES['foto']['tmp_name'];

 	if(!empty($lokasifoto)){
		move_uploaded_file($lokasifoto,"../foto_kamar/$namafoto");

 		$koneksi->query("UPDATE kamar SET nama_kamar='$_POST[nama]',id_kategori='$_POST[id_kategori]',harga_kamar='$_POST[harga]',foto_kamar='$namafoto', deskripsi_kamar='$_POST[deskripsi]' WHERE id_kamar='$_GET[id]'");
 		
 	}
 	else{
 		$koneksi->query("UPDATE kamar SET nama_kamar='$_POST[nama]', id_kategori='$_POST[id_kategori]',harga_kamar='$_POST[harga]', deskripsi_kamar='$_POST[deskripsi]' WHERE id_kamar='$_GET[id]'");

 	}
	echo "<script>alert('Data Kamar Berhasil Di Ubah');</script>";
	echo "<script>location='index.php?halaman=kamar';</script>";
 }
 	?>

