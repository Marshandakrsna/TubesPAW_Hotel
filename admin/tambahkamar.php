<h2>Tambah Kamar</h2>
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
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
 		<label>Nama Kategori</label>
 		<select class="form-control" name="id_kategori">
 			<option value="">Pilih Kategori</option>
 			<?php foreach ($datakategori as $key => $value): ?>
 			<option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>
 			<?php endforeach ?>
 		</select>
 	</div>
	<div class="form-group">
		<label>Harga Per Hari</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" id="deskripsi" rows="10"></textarea>
		<script>
                CKEDITOR.replace( 'deskripsi' );
        </script>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<div class="letak-input" style="margin-bottom: 10px;">
			<input type="file" class="form-control" name="foto[]">
		</div>
	</div>
	<button class ="btn btn-primary" name="save"><i class="glyphicon glyphicon-saved"></i>Simpan</a></button>
		
</form>
<?php
if (isset ($_POST['save']))
{
	$namanamafoto = $_FILES['foto']['name'];
	$lokasilokasifoto =$_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasilokasifoto[0], "../foto_kamar/".$namanamafoto[0]);
	$koneksi->query("INSERT INTO kamar
		(nama_kamar,id_kategori, harga_kamar,foto_kamar,deskripsi_kamar)
		VALUES('$_POST[nama]','$_POST[id_kategori]','$_POST[harga]','$namanamafoto[0]','$_POST[deskripsi]')");
	echo "<script>alert('Tambah Kamar Berhasil');</script>";
	echo "<script>location='index.php?halaman=kamar';</script>";
}
?>

<script>
	$(document).ready(function(){
		$(".btn-tambah").on("click",function(){
			$(".letak-input").append("<input type='file' class='form-control' name='foto[]'>");
		})
	})
</script>