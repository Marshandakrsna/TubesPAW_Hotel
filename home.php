<style type="text/css">
	.share {
		position: fixed;
		height: 45px;
		width: 42px;
		left: 1px;
		bottom: 300px;
		z-index: 9999;
	}
</style>
<?php
    session_start();
    include 'koneksi.php';
?>
<?php
    $datakategori = array();
    $ambil = $koneksi->query("SELECT * FROM kategori");
    while ($tiap = $ambil->fetch_assoc()) {
        $datakategori[] = $tiap;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">

    <meta name="googlebot" content="index,follow">
    <meta name="googlebot-news" content="index,follow">
    <meta name="robots" content="index,follow">
    <meta name="Slurp" content="all">

    <title>Syaliba Hotel</title>
    <link rel="icon" type="image/x-icon" href="admin/assets/img/logo aja.png" >

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="script.js"></script>
    
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;0,700;0,900;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body>
    <!-- SLIDER BAR BUAT HOME SEBELUM LOGIN (UGD) -->
	 <section class="konten">
		<?php include 'menu.php'; ?><br><br><br>
		<?php include 'buttonup.php'; ?>
        <div class="container containerBeforeLogin">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-3">RECOMMENDED ROOM</h3>
                    <h6> Find your favorite room here..</h6>
                </div>
                <div class="col-6 text-right">
                    <a class="btn btn-info mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-info mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
                <div class="col-12">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="card cardBefore">
                                            <img alt="100%x280" src="admin/assets/img/deluxeroom.jpeg">
                                            <div class="card-body">
                                                <h4 class="card-title">Deluxe Room</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card cardBefore">
                                            <img alt="100%x280" src="admin/assets/img/executiveroom.jpeg">
                                            <div class="card-body">
                                                <h4 class="card-title">Executive Room</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card cardBefore">
                                            <img alt="100%x280" src="admin/assets/img/businessroom.jpeg">
                                            <div class="card-body">
                                                <h4 class="card-title">Business Room</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="card cardBefore">
                                            <img alt="100%x280" src="admin/assets/img/premiersuite.jpeg">
                                            <div class="card-body">
                                                <h4 class="card-title">Premiere Suite</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card cardBefore">
                                            <img alt="100%x280" src="admin/assets/img/vviproom.jpeg">
                                            <div class="card-body">
                                                <h4 class="card-title">VVIP Room</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card cardBefore">
                                            <img alt="100%x280" src="admin/assets/img/viproom.jpeg">
                                            <div class="card-body">
                                                <h4 class="card-title">VIP Room</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="mb-3"> LOCATION SYALIBA HOTEL </h3>
                <div class="row">
                    <div class="col-md-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63313.81548802268!2d110.47515707910156!3d-7.341152999999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a79d27a7fa11d%3A0x233a2a304f948f!2sHotel%20Laras%20Asri%20Resort%20and%20Spa%20Salatiga!5e0!3m2!1sen!2sid!4v1634745137672!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
        </div>
            </div>
        </div>
        
		<?php include 'footer.php'; ?>
    </section>

</body>

</html>