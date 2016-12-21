<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title;?>
      <small>Detail seminar</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('peserta')?>"><i class="fa fa-dashboard"></i>Home</a></li>
      <li><a class="active"><?php echo $title;?></a></li>
    </ol>
  </section>
        
  <!-- Main content -->
  <section class="content">
    
    <script type="text/javascript">
      <?php //$this->session->flashdata('bounce');?>
      <?php //$this->session->flashdata('notification');?>
    </script>

    <div class="row">
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
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

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
