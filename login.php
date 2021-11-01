<?php
	session_start();
	include 'koneksi.php';
?>

<?php include 'menu.php'; ?><br><br><br>

<!DOCTYPE html>
<html>

<head>
	<title>Login Customer Syaliba Hotel</title>
	<link rel="icon" type="image/x-icon" href="admin/assets/img/logo aja.png" >
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="style.css">
	
</head>

<body>
	<div class="wrapper">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Login Customer Syaliba Hotel</h3>
					</div>
					<div class="panel-body">
						<form method="post">
							<div class="form-group">
								<label>Email</label>
								<input 
									type="email" 
									name="email" 
									class="form-control"
									placeholder="Type your Email" 
									required/>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input 
									type="password" 
									class="form-control" 
									name="password"
									placeholder="Type your Password" 
									required/>
							</div>
							<button class="btn btn-primary" name="simpan">Masuk</button>
							<a href="daftar.php" class="btn btn-primary">Daftar</a>
						</form>
					</div>
				</div>

			</div>

		</div>

	</div>

	<?php
	if (isset($_POST["simpan"])) {
		$email = $_POST["email"];
		$password = md5($_POST["password"]);
		
		$ambil = $koneksi->query("SELECT * FROM pelanggan
		WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
		$akunyangcocok = $ambil->num_rows;
		if ($akunyangcocok == 1) {
			$akun = $ambil->fetch_assoc();
			if ($akun['aktif'] == "1") {
				$_SESSION["pelanggan"] = $akun;
				echo "<script> alert('Yeyy, Login Berhasil, Happy Staycation!');</script>";
				echo "<script> location ='index.php';</script>";
			} else {
				echo "<script> alert('Akun Anda Belum Di Aktivasi nih, Aktivasi dulu yaa :)');</script>";
				echo "<script> location ='login.php';</script>";
			}
		} else {
			echo "<script> alert('Yahh Gagal Login, coba lagi yaah');</script>";
			echo "<script> location ='login.php';</script>";
		}
	}
	?>
	<?php include 'footer.php'; ?>
</body>

</html>