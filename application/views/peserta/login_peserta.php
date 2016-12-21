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

  </head>
  <body class="skin-blue fixed" style="background: #eee;">

      <header class="main-header">
        <a href="<?php echo site_url('web');?>" class="logo text-muted">
          SinarPNB
        </a>
      
        <nav class="navbar navbar-static-top" role="navigation">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-2 pull-right">
                <a type="button" class="btn btn-info navbar-btn" href="<?php echo site_url('panitia/loginPanitia');?>">Login Panitia</a>
                  <!-- <a type="button" class="btn bg-navy navbar-btn" href="<?php echo site_url('peserta/loginPeserta');?>">Login Peserta</a> -->
              </div>
              </div>
            </div>
        </nav>
    </header>
    <br><br>

    <!--<div class="animated bounceIn">-->
    <div class="login-box <?php echo $this->session->flashdata('bounce');?>">
      <div class="login-logo">
        <a href="#!">Login <b class="text-green">Peserta</b></a>
      </div><!-- /.login-logo -->
      <?php
        echo $this->session->flashdata('notification');
      ?>
      <div class="box box-success">
        <div class="login-box-body">
        
          <p class="login-box-msg">Silahkan login untuk ke halaman peserta</p>
          <form action="<?php echo base_url('peserta/cekLoginPeserta'); ?>" method="post">
            <div class="form-group has-feedback">
              <input type="email" class="form-control" placeholder="Email" name="email" required>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password" name="password" required>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <!--
              <div class="col-xs-8">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox"> Remember Me
                  </label>
                </div>
              </div>
              -->
              <div class="col-xs-6 text-left ">
                <a href="#" class="text-green">Lupa Password ?</a>
              </div>

              <div class="col-xs-4 col-xs-offset-2">
                <button type="submit" class="btn btn-success btn-block btn-flat">Login</button>
              </div><!-- /.col -->
            </div>
          </form>

          <!--
          <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
          </div>
          -->
          <br>
          <div class="row">
            <div class="col-xs-6">
              <a href="<?php echo site_url('peserta/daftarPeserta');?>" class="text-green">Buat akun peserta</a>
              
            </div>
            <div class="col-xs-6 text-right">
              <a class="text-green" href="javascript:history.go(-1)">Batal Login</a>
            </div>
          </div>
          
        </div><!-- /.login-box-body -->
      </div>
    </div><!-- /.login-box -->
      

  </body>
</html>



<!--<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">-->
<!--<script src="<?php echo base_url('assets/js/tinymce/tinymce.min.js');?>"></script>-->