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
		  
		  	<nav class="navbar navbar-static-top" role="navigation">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
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
                        <div class="col-lg-2 pull-right">
                            <a type="button" class="btn bg-maroon navbar-btn">Buat Akun</a>
                            <a type="button" class="btn btn-default navbar-btn ">Login</a>
                        </div>
                    </div>
                </div>
            </nav>
		</header>

		<br><br><br><br>
	

		<!-- Content Wrapper. Contains page content -->
       

            <div class="row">
                <div class="container-fluid">
              <div class="col-xs-12">
                <!-- Default box -->
                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $seminar[0]->judul;?></h3>

                    <div class="box-tools pull-right">
                      <!--<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="row">
                      <div class="col-xs-4">
                        <center><img src="<?php echo base_url('uploads/seminar/').$seminar[0]->foto;?>" width="300" height="400"></center>
                      </div>
                      <div class="col-xs-8">
                        <table class="table table-striped">
                          <tr>
                            <th class="col-xs-4">Tanggal Acara</th>
                            <td class="col-xs-8"><?php echo $seminar[0]->tanggal;?></td>
                          </tr>
                          <tr>
                            <th class="col-xs-4">Harga Tiket</th>
                            <td class="col-xs-8"><?php echo $seminar[0]->harga;?></td>
                          </tr>  
                          <tr>
                            <th class="col-xs-4">Target Peserta</th>
                            <td class="col-xs-8"><?php echo $seminar[0]->peserta;?></td>
                          </tr>
                          <tr>
                            <th class="col-xs-4">Persentase Peserta Mendaftar</th>
                            <td class="col-xs-8">
                              <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width: <?php echo $kuota_peserta.'%';?>"></div>
                              </div><?php echo $kuota_peserta."%";?>
                            </td>
                          </tr>
                          <tr>
                            <th>Status Seminar</th>
                            
                              <?php
                                if ($kuota_peserta<100) {
                                  echo "<td>Pendaftaran masih dibuka</td>";
                                } else {
                                  echo "<td class='text-red'>Pendaftaran sudah ditutup</td>";
                                }
                              ?>
                          </tr>
                          <tr>
                            <th class="col-xs-4">Deskripsi</th>
                            <td class="col-xs-8"><?php echo $seminar[0]->deskripsi;?></td>
                          </tr> 
                        </table>
                      </div>
                    </div>
                    <br>

                    <!--peserta-->
                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-success">
                          <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Peserta Terdaftar
                              </a>
                            </h4>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                            <?php 
                                if ($jml_peserta>0) {
                                ?>
                                <h4>Total : <?php echo $jml_peserta;?></h4>
                              <table class="table table-striped">
                              <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Instansi</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                              </tr>
                              <?php
                                $no=1;
                                foreach ($semua_peserta as $peserta) {
                                  # code...
                                
                              ?>
                              <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $peserta->nama_lengkap;?></td>
                                <td><?php echo $peserta->instansi;?></td>
                                <td><?php echo $peserta->tgl_daftar;?></td>
                                <?php
                                  if ($peserta->status_bayar == 1) {
                                    echo "<td><b>Lunas</b></td>";
                                  } else {
                                    echo "<td style='color:red;'><b>Belum Lunas</b></td>";
                                  }
                                ?>
                              </tr>
                              <?php $no++;} ?>
                            </table>
                            <?php } else {
                                echo "<h5>Belum ada peserta yang mendaftar</h5>"; }
                              ?>
                            </div>
                          </div>
                        </div>
                    </div>


                  </div><!-- /.box-body -->
                  <div class="box-footer">
                     <?php
                      if ($kuota_peserta<100) { ?>

                      <a onclick="ikut('<?php echo $seminar[0]->id?>')" class="btn btn-success btn-flat">Daftar Seminar</a>
                    <?php
                      }
                    ?>
                    <a href="javascript:history.go(-1)" class="btn pull-right">Kembali</a>
                  </div><!-- /.box-footer-->
                </div><!-- /.box -->
              </div>
              </div>
            </div> 

        <script type="text/javascript">
          function ikut(id){
            swal({
              title: "Ingin mengikuti seminar ini?",
              text: "Data anda akan dikirim",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Ya!",
              cancelButtonText: "Tidak!",
              closeOnConfirm: false,
              closeOnCancel: false
            },

            function(isConfirm){
              if (isConfirm) {
                var link = "<?php echo site_url('peserta/ikutiSeminar/'); ?>"+id;
                window.location = link;
                //swal("Terdaftar!", "Data anda sudah dikirim", "success");
              } else {
                swal("Batal", "Anda batal mengikuti seminar", "error");
              }
            });
          }
        </script>


    </body>
</html>
