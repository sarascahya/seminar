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
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/green.css');?>">

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.min.js');?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js');?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/dist/js/app.min.js');?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('assets/dist/js/demo.js');?>"></script>

    <!-- sweetalert -->
    <script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js');?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js');?>"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-green',
          radioClass: 'iradio_square-green',
          increaseArea: '20%' // optional
        });
      });
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body class="skin-blue fixed" style="background: #eee;">

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
    <br><br>

    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div class="jumbotron">
                <div class="container">
                <br><br><br><br><br><br>
                <center>
                <h2><b>Akun Peserta</b></h2>
                <br>
                  <p>Dengan memiliki akun Peserta, anda dapat mendaftarkan diri anda di seminar yang akan anda ikuti</p>
                  </center>
                </div>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="register-box <?php echo $this->session->flashdata('bounce'); ?>">
                <center><h2>Daftar <b>Peserta</b></h2></center>

              <?php echo $this->session->flashdata('notification'); ?>
              <div class="box box-success">
                <div class="register-box-body">
                  <form action="<?php echo site_url('peserta/prosesDaftarPeserta');?>" method="post">
                    <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nama Panggilan" name="nama_panggilan" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>

                    <div class="form-group has-feedback">
                    <center>
                    <fieldset>
                    <label class="radio-inline">
                      <input type="radio" name="jk" id="" value="L" checked> Laki - laki
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="jk" id="" value="P"> Perempuan
                    </label>
                    </fieldset>
                    </center>
                    </div>


                  <div class="form-group has-feedback">
                    <input type="number" class="form-control" placeholder="No HP" name="no_telp" required>
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="pass1" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Ulangi password" id="pass2" onchange="cekPassword()" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="checkbox icheck">
                        <label>
                          <input type="checkbox" required> Saya menyetujui <a class="text-green" href="#">syarat dan ketentuan</a>
                        </label>
                      </div>
                    </div><!-- /.col -->
                    <div class="col-xs-8">
                      <a class="btn text-green" href="javascript:history.go(-1)">Batal Daftar</a>
                    </div>
                    <div class="col-xs-4">
                      <button type="submit" class="btn btn-success btn-block btn-flat">Daftar</button>
                    </div><!-- /.col -->
                  </div>
                  </form>

                 <!--  <a href="<?php echo site_url('panitia/loginPanitia');?>" class="text-center">Saya sudah punya akun peserta</a><br>
                  <a href="<?php echo site_url('web/pilihanDaftar');?>" class="text-center">Kembali ke Pilihan Daftar</a>
                </div> --><!-- /.form-box -->
              </div>
              </div><!-- /.register-box -->
      <script type="text/javascript">
      var pass1;
      var pass2;

      function cekPassword(){
        pass1 = $("#pass1").val();
        pass2 = $("#pass2").val();

        if (pass1 != pass2) {
          sweetAlert("Password Salah!", "Password yang anda masukkan tidak cocok", "error");
          //alert('Password tidak cocok');
          $("#pass1").val('');
          $("#pass2").val('');
        }
      }
    </script>
            
        </div>
        
    </div>
    


      
  </body>
</html>
