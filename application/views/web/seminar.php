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
  
  <body class="skin-blue fixed">

  		<header class="main-header">
		  	<a href="<?php echo site_url('web');?>" class="logo">
		    <!-- LOGO -->
		    	SinarPNB
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
                <?php 
                    for ($i=0; $i < $jml_data; $i++) { 
                ?>
                <div class="col-xs-4">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $seminar[$i]->judul;?></h3>
                        </div>
                        <div class="box-body">
                                <div class="col-xs-4">
                                    <img src="<?php echo base_url('uploads/seminar/').$seminar[$i]->foto;?>" width="130" height="130">
                                </div>
                                <div class="col-xs-8">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Tanggal Acara</th>
                                            <td><?php echo $seminar[$i]->tanggal;?></td>
                                        </tr>
                                        <tr>
                                            <th>Harga Tiket</th>
                                            <td><?php echo $seminar[$i]->harga;?></td>
                                        </tr>
                                        <tr>
                                        <th>Status Seminar</th>
                                            <?php
                                                if ($kuota_peserta[$i]<100) {
                                                  echo "<td>Pendaftaran masih dibuka</td>";
                                                } else {
                                                  echo "<td class='text-red'>Pendaftaran sudah ditutup</td>";
                                                }
                                            ?>
                                        </tr>
                                    </table>
                                </div>
                        </div>
                        <div class="box-footer">
                            <?php
                                if ($kuota_peserta[$i]<100) { ?>
                                    <a href="<?php echo site_url('web/daftarSeminar')?>" class="btn btn-success btn-flat">Daftar Seminar</a>
                            <?php
                                }
                            ?>
                        
                            <a href="<?php echo site_url('web/detailSeminar/'.$seminar[$i]->id)?>" class="btn pull-right">Detail Seminar</a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div> 

        </div>

        
    </body>
</html>
