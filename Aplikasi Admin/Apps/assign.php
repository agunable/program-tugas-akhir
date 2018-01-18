<?php
    include('login/cek-login.php');
    include('login/config.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="mobile-web-app-capable" content="yes">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
  </head>
    <?php 
    
    $user=$_SESSION['username'];
	$query = mysql_query("select * from tb_admin where id='$user' ");
	
	
	$data = mysql_fetch_array($query);
    
    ?>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <div class="sidenav-header-inner text-center"><img src="img/<?php echo $data['foto'] ?>" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5 text-uppercase"><?php echo $data['nama'] ?></h2><span class="text-uppercase">Admin</span>
          </div>
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>A</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="index.php"> <i class="icon-home"></i><span>Home</span></a></li>
            <li class="active"> <a href="forms.html"><i class="icon-form"></i><span>Registrasi</span></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page forms-page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>Admin</span><strong class="text-primary"> Dashboard</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning">0</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>view all notifications                                            </strong></a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i><span class="badge badge-info">0</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-envelope"></i>Read all messages    </strong></a></li>
                  </ul>
                </li>
                <li class="nav-item"><a href="login.html" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Registrasi</li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <header> 
            <h1 class="h3 display">Registrasi</h1>
          </header>
          <div class="row">
            <div class="col-lg-6 col-sm-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Registrasi Device &amp; Manula</h2>
                </div>
                <div class="card-body">
                  <p>Registrasi device dengan pengguna device</p>
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label class="col-sm-2">Device ID</label>
                      <div class="col-sm-10">
                        <input name="beaconId" type="text" placeholder="Device ID" class="form-control form-control-success"><small class="form-text">Isikan dengan ID wearable device</small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2">Nama Manula</label>
                      <div class="col-sm-10">
                        <input name="nama" type="text" placeholder="Nama Manula" class="form-control form-control-warning"><small class="form-text">Isikan dengan nama manula yang menggunakan</small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2">Umur</label>
                      <div class="col-sm-10">
                        <input name="umur" type="text" placeholder="Umur Manula" class="form-control form-control-warning"><small class="form-text">Isikan dengan umur manula yang menggunakan</small>
                      </div>
                    </div>
                    <div class="form-group row">       
                      <div class="col-sm-10 offset-sm-2">
                        <input type="submit" value="Assign" class="btn btn-primary">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Registrasi Device &amp; Anggota Keluarga</h2>
                </div>
                <div class="card-body">
                  <p>Registrasi device dengan anggota keluarga agar anggota keluarga yang akan didaftarkan dapat menerima notifikasi</p>
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label class="col-sm-2">Device ID</label>
                      <div class="col-sm-10">
                        <input name="beaconId" type="text" placeholder="Device ID" class="form-control form-control-success"><small class="form-text">Isikan dengan ID wearable device</small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2">Nama Keluarga</label>
                      <div class="col-sm-10">
                        <input name="namaKeluarga" type="text" placeholder="Nama Anggota Keluarga" class="form-control form-control-warning"><small class="form-text">Isikan dengan nama anggota keluarga yang ingin menerima notifikasi dari device yang dikenakan manula</small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2">ID LINE</label>
                      <div class="col-sm-10">
                        <input name="lineId" type="text" placeholder="ID LINE" class="form-control form-control-warning"><small class="form-text">Isikan dengan ID LINE dari anggota keluarga</small>
                      </div>
                    </div>
                    <div class="form-group row">       
                      <div class="col-sm-10 offset-sm-2">
                        <input type="submit" value="Assign" class="btn btn-primary">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
            
            <div class="row">
            <div class="col-lg-6 col-sm-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Registrasi Dokter</h2>
                </div>
                <div class="card-body">
                  <p>Registrasi dokter sebagai dokter untuk mengawasi manula</p>
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label class="col-sm-2">ID Dokter</label>
                      <div class="col-sm-10">
                        <input name="beaconId" type="text" placeholder="ID Dokter" class="form-control form-control-success"><small class="form-text">Isikan dengan ID dokter</small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2">Nama Dokter</label>
                      <div class="col-sm-10">
                        <input name="nama" type="text" placeholder="Nama Dokter" class="form-control form-control-warning"><small class="form-text">Isikan dengan nama dokter</small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2">ID LINE</label>
                      <div class="col-sm-10">
                        <input name="umur" type="text" placeholder="ID LINE Dokter" class="form-control form-control-warning"><small class="form-text">Isikan dengan ID LINE Dokter</small>
                      </div>
                    </div>
                    <div class="form-group row">       
                      <div class="col-sm-10 offset-sm-2">
                        <input type="submit" value="Assign" class="btn btn-primary">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            </div>
          </div>  
      </section>
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Computer Engineering ITS &copy; 2017</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Developed by <a href="https://gunglaksman.com" class="external">Surya Laksamana</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/front.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </body>
</html>