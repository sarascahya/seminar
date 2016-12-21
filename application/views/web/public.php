<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SinarPNB</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
     <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css');?>">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css')?>">
    <!--animated-->
    <link rel="stylesheet" href="<?php echo base_url('assets/animate/animate.min.css');?>">
    <!--sweet alert-->
    <link rel="stylesheet" href="<?php echo base_url('assets/sweetalert/sweetalert.css');?>">

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.min.js');?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/dist/js/app.min.js');?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('assets/dist/js/demo.js');?>"></script>

    <!-- sweetalert -->
    <script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js');?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js');?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body class="skin-blue" style="background: #eee;">

  		<header class="main-header">
		  	<a href="<?php echo site_url('web');?>" class="logo text-muted">
		    	SinarPNB
		  	</a>
		  
		  	<nav class="navbar navbar-static-top" role="navigation">
			  	<div class="container-fluid">
			  		<div class="row">
			  			<div class="col-lg-3 pull-right">
			  				<a type="button" class="btn btn-info navbar-btn" href="<?php echo site_url('panitia/loginPanitia');?>">Login Panitia</a>
		      				<a type="button" class="btn btn-success navbar-btn" href="<?php echo site_url('peserta/loginPeserta');?>">Login Peserta</a>
			  			</div>
		      		</div>
	      		</div>
		  	</nav>
		</header>

		<!--<br><br><br>
		
		<a href="<?php echo site_url('web/lihatSeminar');?>">Lihat Seminar</a> -->

<div class="jumbotron"  style="height:550px;">
  <center>
    <div class="container">

    <h2>Selamat datang di </h2>
    <h1>Sinar PNB</h1>
    <h3>Sistem Informasi Pendaftaran Peserta Seminar di Politeknik Negeri Bali</h3>
      <p>Situs untuk mempromosikan, memanajemen, dan mendaftar seminar yang ada di Politeknik Negeri Bali</p>
      <p><a class="btn btn-warning btn-lg" href="<?php echo site_url('web/lihatSeminar');?>" role="button">Cari Seminar</a></p>
    </div>
    <br><br>
    <p>Buat Akun anda sekarang, GRATIS!</p>
    <div class="row">
        <div class="col-md-1 col-md-offset-5">
            <center><a class="btn btn-info btn-lg" href="<?php echo site_url('panitia/daftarPanitia');?>" role="button">Panitia</a></center>
        </div>
        <div class="col-md-1">
            <center><a class="btn btn-success btn-lg" href="<?php echo site_url('peserta/daftarPeserta');?>" role="button">Peserta</a></center>
        </div>
    </div>
  </center>
</div>	

	    
  </body>
</html>
