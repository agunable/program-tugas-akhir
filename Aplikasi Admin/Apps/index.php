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
      <meta name="mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
    <?php 
    
    $user=$_SESSION['username'];
	$query = mysql_query("select * from tb_admin where id='$user' ");
    $queryManula = mysql_query("SELECT count(*) as jumlah from tb_profilemanula");
    $queryKeluarga = mysql_query("SELECT count(*) as jumlah_keluarga from tb_keluarga");
    $queryJumlahPesan = mysql_query("SELECT count(*) as jumlah from tb_pesandokter");
    $queryDokter = mysql_query("SELECT * from tb_profiledokter");
    $queryPesan = mysql_query("SELECT tb_profiledokter.nama as namaDokter, tb_pesandokter.dari, tb_pesandokter.kepada, tb_pesandokter.pesan, tb_pesandokter.waktu, tb_profilemanula.beaconId, tb_profilemanula.nama as namaManula FROM tb_pesandokter INNER JOIN tb_profiledokter ON tb_pesandokter.dari=tb_profiledokter.dokterId INNER JOIN tb_profilemanula ON tb_pesandokter.kepada=tb_profilemanula.beaconId;");
	
    $hasilQueryJumlahPesan = mysql_fetch_array($queryJumlahPesan);
    $jumlahKeluarga = mysql_fetch_array($queryKeluarga);
	$hasilQueryDokter = mysql_fetch_array($queryDokter);
	$data = mysql_fetch_array($query);
    $jumlahManula = mysql_fetch_array($queryManula);
    
    ?>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <div class="sidenav-header-inner text-center"><img src="img/<?php echo $data['foto']; ?>" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5 text-uppercase"><?php echo $data['nama'] ?></h2><span class="text-uppercase">Admin</span>
          </div>
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>A</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li class="active"><a href="index.php"> <i class="icon-home"></i><span>Home</span></a></li>
            <li> <a href="assign.php"><i class="icon-form"></i><span>Registrasi</span></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page home-page">
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
                <li class="nav-item"><a href="logout.php" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Counts Section -->
      <section class="dashboard-counts section-padding">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name"><strong class="text-uppercase">Manula</strong><span>Jumlah pengguna</span>
                  <div class="count-number"><?php echo $jumlahManula['jumlah']; ?></div>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-padnote"></i></div>
                <div class="name"><strong class="text-uppercase">Keluarga</strong><span>Anggota keluarga terdaftar</span>
                  <div class="count-number"><?php echo $jumlahKeluarga['jumlah_keluarga']; ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Header Section-->
      <!-- Statistics Section-->
      <!-- Updates Section -->
      <section class="updates">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-md-12">
              <!-- Recent Updates            -->
              
            </div>
            <!-- Daily Feed-->
            <div class="col-lg-4 col-md-6">
              <div id="daily-feeds" class="wrapper daily-feeds">
                <div id="feeds-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-feeds" href="#feeds-box" aria-expanded="true" aria-controls="feeds-box">Pesan Dokter</a></h2>
                  <div class="right-column">
                    <div class="badge badge-primary"><?php echo $hasilQueryJumlahPesan['jumlah']; ?> message(s)</div><a data-toggle="collapse" data-parent="#daily-feeds" href="#feeds-box" aria-expanded="true" aria-controls="feeds-box"><i class="fa fa-angle-down"></i></a>
                  </div>
                </div>
                <div id="feeds-box" role="tabpanel" class="collapse show">
                  <div class="feed-box">
                    <ul class="feed-elements list-unstyled">
                    <?php 
                    
                        while ($hasilQueryPesan = mysql_fetch_array($queryPesan)) 
                        {
                        
                    ?>
                      <!-- List-->
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/nadira.jpg" alt="person" class="img-fluid rounded-circle"></a>
                            <div class="content"><strong><?php echo $hasilQueryPesan['namaDokter']; ?></strong><small>Kepada <?php echo $hasilQueryPesan['namaManula']; ?></small>
                              <div class="full-date"><small><?php echo $hasilQueryPesan['waktu']; ?></small></div>
                            </div>
                          </div>
                          <div class="date"><small></small></div>
                        </div>
                        <div class="card"> <small><?php echo $hasilQueryPesan['pesan']; ?></small></div>
                        <div class="CTAs pull-right"><a href="#" class="btn btn-xs btn-dark"><i class="fa fa-trash-o"> </i>Delete</a></div>
                      </li>
                    <?php
                      
                        }
                            
                    ?>    
                        
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Recent Activities                            -->
            <div class="col-lg-4 col-md-6">
              
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="js/charts-home.js"></script>
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