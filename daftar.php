<?php include 'koneksi.php'; ?>
<?php include 'menu.php'; ?><br><br><br>
<!DOCTYPE html>
<html>
<head>
	<title>Register Syaliba Hotel</title>
	<link rel="icon" type="image/x-icon" href="admin/assets/img/logo aja.png" >
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-7 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Customer Syaliba Hotel</h3>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-md-3">Nama</label>
							<div class="col-md-7">
								<input 
									type="text" 
									name="nama" 
									class="form-control" 
									placeholder="Type your Name" 
									required />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Email</label>
							<div class="col-md-7">
								<input 
									type="email" 
									name="email" 
									class="form-control" 
									placeholder="Type your Email" 
									required />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Password</label>
							<div class="col-md-7">
								<input 
									type="text" 
									name="password" 
									class="form-control" 
									placeholder="Type your Password"
									required />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Alamat</label>
							<div class="col-md-7">
								<textarea 
									class="form-control " 
									name="alamat" 
									required>
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Telepon</label>
							<div class="col-md-7">
								<input 
									type="text" 
									name="telepon" 
									class="form-control"
									placeholder="Enter your telephone number"
                    				pattern="[0][8][0-9]{8,10}"
									required/>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-7 col-md-offset-3">
								<button class="btn btn-primary" name="daftar">Daftar</button>
							</div>
						</div>
						
					</form>

					<?php  
					if (isset($_POST["daftar"])) 
					{
						$nama = $_POST['nama'];
						$email = $_POST['email'];
						$password = md5($_POST["password"]);
						$alamat = $_POST['alamat'];
						$telepon = $_POST['telepon'];
						$token=hash('sha256', md5(date('Y-m-d'))) ;

						// untuk mengecek apakah email sudah ada ato belomm
						$ambil=$koneksi->query("SELECT*FROM pelanggan 
							WHERE email_pelanggan='$email'");
						$yangcocok=$ambil->num_rows;
						if ($yangcocok==1) 
						{
							echo "<script>alert('[!] Pendaftaran gagal, email sudah terdaftar sebelumnya !')</script>";
							echo "<script>location='daftar.php';</script>";
						}
						else
						{
							$koneksi->query("INSERT INTO pelanggan
								(nama_pelanggan, email_pelanggan,  password_pelanggan, alamat, telepon_pelanggan, fotoprofil, token, aktif)
								VALUES('$nama','$email','$password','$alamat','$telepon', 'Untitled.png', '$token', '0')");
							
							include("mail.php");
							echo "<script>alert('pendaftaran berhasil')</script>";
							echo "<script>location='login.php';</script>";
						}
					}
					?>
				</div>
			</div>
			
		</div>
		
	</div>
	
</div>
<?php include 'footer.php'; ?>
</body>
</html>