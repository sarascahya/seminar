<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SistemiPNB</title>
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
  
  <body class="skin-blue fixed">

  		<header class="main-header">
		  	<a href="<?php echo site_url('web');?>" class="logo">
		    <!-- LOGO -->
		    	SistemiPNB
		  	</a>
            <script type="text/javascript">
      <?php echo $this->session->flashdata('notification');?>
    </script>
		  
		  	<nav class="navbar navbar-static-top" role="navigation">
			  	<div class="container-fluid">
			  		<div class="row">
			  			<div class="col-lg-12 pull-right">
				  			<form class="navbar-form pull-right" method="POST" action="<?php echo site_url('web/cariSeminar'); ?>">
						        <div class="input-group">
						            <input type="text" class="form-control" placeholder="Cari Seminar..." name="cari" value="<?php echo $this->session->flashdata('cari'); ?>" >
						            <span class="input-group-btn">
						              <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-search"></span></button>
						              <a href="<?php echo site_url('web/lihatSeminar'); ?>" class="btn btn-info"><i class="fa fa-refresh"></i></a>
						            </span>
						        </div>
					        </form>
		      			</div>
			  			<!-- <div class="col-lg-2 pull-right">
			  				<a type="button" class="btn bg-maroon navbar-btn">Buat Akun</a>
		      				<a type="button" class="btn btn-default navbar-btn ">Login</a>
			  			</div> -->
		      		</div>
	      		</div>
		  	</nav>
		</header>

		<br><br><br><br>
	

		<div class="row">
            <div class="container-fluid">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="box box-solid box-info">
                        <div class="box-header">
                            <center><h3 class="box-title">Pendaftaran Seminar</h3></center>
                        </div>
                        <div class="box-body">
                            <center><h4>Anda harus login menggunakan Akun Peserta untuk mendaftar di seminar ini</h4></center>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-lg-5 col-lg-offset-1">
                                    <a href="javascript:history.go(-1)" class="btn btn-danger btn-flat">Batal</a>
                                </div>
                                <div class="col-lg-6 pull-right">
                                    <a href="<?php echo site_url('peserta/daftarPeserta');?>" class="btn bg-maroon btn-flat">Buat Akun Peserta</a>
                                    <a href="<?php echo site_url('peserta/loginPeserta');?>" class="btn btn-success btn-flat">Login Peserta</a>
                                </div>
                            </div>
                            
                           
                            
                        </div>

                    </div>
                </div>
            </div> 

        </div>

        
    </body>
</html>
