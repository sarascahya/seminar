<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title;?>
      <small>Semua data seminar saya</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('panitia')?>"><i class="fa fa-dashboard"></i>Home</a></li>
      <li><a class="active"><?php echo $title;?></a></li>
    </ol>
  </section>
        
  <!-- Main content -->
  <section class="content">
    
    <script type="text/javascript">
      <?php //$this->session->flashdata('bounce');?>
      <?php $this->session->flashdata('notification');?>
    </script>

    <div class="row">
      <div class="col-xs-12">
        <!-- Default box -->
        <div class="box box-info">
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
                        <div class="progress-bar progress-bar-info" style="width: <?php echo $kuota_peserta.'%';?>"></div>
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

            
            
          </div><!-- /.box-body -->
          <div class="box-footer">
            <a class="btn btn-primary btn-flat" href="<?php echo site_url('panitia/editSeminar/'.$seminar[0]->id)?>">Edit</a>
            <!--<a class="btn btn-danger btn-flat" href="<?php echo site_url('panitia/hapusSeminar/'.$sem->id)?>">Hapus</a>-->
            <a onclick="hapus('<?php echo $seminar[0]->id; ?>')" class="btn btn-danger btn-flat"> Hapus</a>
            <a class="btn bg-maroon btn-flat" href="<?php echo site_url('panitia/lihatLaporanSeminar/'.$seminar[0]->id)?>">Laporan</a>
            <a class="btn bg-purple btn-flat" href="<?php echo site_url('panitia/managePesertaById/'.$seminar[0]->id)?>">Manage Peserta</a>
            <a href="javascript:history.go(-1)" class="pull-right">Kembali</a>
          </div><!-- /.box-footer-->
        </div><!-- /.box -->
      </div>
    </div> 
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">
  function hapus(id){
    swal({
      title: "Yakin ingin menghapus ?",
      text: "Data akan dihapus dari sistem",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Ya, Hapus!",
      cancelButtonText: "Tidak, Batal!",
      closeOnConfirm: false,
      closeOnCancel: false
    },

    function(isConfirm){
      if (isConfirm) {
        var link = "<?php echo site_url('panitia/hapusSeminar/'); ?>"+id;
        window.location = link;
        //swal("Terhapus!", "Data seminar berhasil dihapus", "success");
      } else {
        swal("Batal", "Anda batal menghapus", "error");
      }
    });
  }

</script>
