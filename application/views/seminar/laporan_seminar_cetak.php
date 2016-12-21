<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan <?php echo $seminar[0]->judul;?></title>
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


    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/dist/js/app.min.js');?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->

      <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-file"></i> <?php echo $seminar[0]->judul;?>
                <small class="pull-right">Tanggal: <?php //echo date(); ?>
                  <script type="text/javascript">
                      var today = new Date();
                      var dd = today.getDate();
                      var mm = today.getMonth()+1; //January is 0!
                      var yyyy = today.getFullYear();

                      if(dd<10) {
                          dd='0'+dd
                      } 

                      if(mm<10) {
                          mm='0'+mm
                      } 

                      today = dd+'/'+mm+'/'+yyyy;
                      document.write(today);

                  </script>
                </small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
              <div class="col-xs-4">
                <center><img src="<?php echo base_url('uploads/seminar/').$seminar[0]->foto;?>" width="300" height="250"></center>
              </div>
              <div class="col-xs-8">
                <table class="table">
                  <tr>
                    <th class="col-xs-4">Panitia Pelaksana</th>
                    <td class="col-xs-8"><?php echo $this->session->userdata('nama')." ".$id = $this->session->userdata('username');; ?></td>
                  </tr>
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
                    <td class="col-xs-8"><?php echo $kuota_peserta."%";?></td>
                  </tr>
                  <tr>
                    <th class="col-xs-4">Status Target Peserta</th>
                      <?php
                        if ($kuota_peserta<100) {
                          echo "<td>Target Peserta Belum Tercapai</td>";
                        } else {
                          echo "<td class='text-red'>Target Peserta Sudah Tercapai</td>";
                        }
                      ?>
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
                  
                </table>
              </div>    
          </div><!-- /.row -->

          <?php
            if ($jml_peserta_bayar<=0) {
              echo "<h4>Belum ada peserta.</h4>";
            } else {
          ?>

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Peserta</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Instansi</th>
                    <th>Tanggal Daftar</th>
                    <th>Tanggal Bayar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                            $no=1;
                            foreach ($semua_peserta_bayar as $peserta) {
                              # code...
                            
                          ?>
                          <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $peserta->nama_lengkap;?></td>
                            <td><?php echo $peserta->email;?></td>
                            <td><?php echo $peserta->no_telp;?></td>
                            <td><?php echo $peserta->instansi;?></td>
                            <td><?php echo $peserta->tgl_daftar;?></td>
                            <td><?php echo $peserta->tgl_bayar;?></td>
                            
                          </tr>
                          <?php $no++;} ?>
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-4 col-xs-offset-6">
              
            </div><!-- /.col -->
            <div class="col-xs-2">
              <p class="lead"></p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>Total Peserta :</th>
                    <td><?php echo $jml_peserta_bayar?></td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <?php } ?>


          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="<?php echo site_url('panitia/cetakLaporan/').$seminar[0]->id;?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <a href="javascript:history.go(-1)" class="pull-right">Kembali</a>
              <!--<button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>-->
            </div>
          </div>
        </section><!-- /.content -->

    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    
  </body>
</html>
