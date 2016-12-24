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
    <?php //$this->session->flashdata('bounce');?>
    <script type="text/javascript">
      <?php echo $this->session->flashdata('notification');?>
    </script>

    <div class="row">
      <div class="col-lg-2">
        <a class="btn btn-info btn-flat btn-block" href="<?php echo site_url('panitia/tambahSeminar')?>" role="button">TAMBAH SEMINAR</a>
      </div>
      <div class="col-lg-10">
        <form method="POST" action="<?php echo site_url('panitia/cariSeminar'); ?>">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari Seminar..." name="cari" value="<?php echo $this->session->flashdata('cari'); ?>" >
            <span class="input-group-btn">
              <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-search"></span></button>
              <a href="<?php echo site_url('panitia/lihatSeminarById'); ?>" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span></a>
            </span>
          </div>
        </form>
      </div>
    </div>
    <br>
    <?php
    if ($jml_data == 0) {
      echo "<h4>Anda belum memiliki seminar, silahkan tambahkan seminar anda</h4>";
    } else {
    ?>

    <div class="row">
      <?php 
        //foreach ($seminar as $sem){
        for ($i=0; $i < $jml_data; $i++) { 
      ?>
      <div class="col-xs-6">
        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $seminar[$i]->judul;?></h3>
            <div class="box-tools pull-right">
              <!--<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-4">
                <img src="<?php echo base_url('uploads/seminar/').$seminar[$i]->foto;?>" width="150" height="150">
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
                    <th>Target Peserta</th>
                    <td><?php echo $seminar[$i]->peserta;?></td>
                  </tr>  
                  <tr>
                    <th>Persentase Peserta</th>
                    <td>
                      <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar progress-bar-info" style="width: <?php echo $kuota_peserta[$i].'%'; ?>"></div>
                      </div>
                      <?php echo $kuota_peserta[$i].' %'; ?>
                    </td>
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
          </div><!-- /.box-body -->
          <div class="box-footer">
            <a class="btn btn-primary btn-flat" href="<?php echo site_url('panitia/editSeminar/'.$seminar[$i]->id)?>">Edit</a>
            <!-- <a class="btn btn-danger btn-flat" href="<?php echo site_url('panitia/hapusSeminar/'.$seminar[$i]->id)?>">Hapus</a> -->
            <a onclick="hapus('<?php echo $seminar[$i]->id; ?>')" class="btn btn-danger btn-flat"> Hapus</a>
            <a class="btn bg-maroon btn-flat" href="<?php echo site_url('panitia/lihatLaporanSeminar/'.$seminar[$i]->id)?>">Laporan</a>
            <a class="btn bg-purple btn-flat" href="<?php echo site_url('panitia/managePesertaById/'.$seminar[$i]->id)?>">Manage Peserta</a>
            <a href="<?php echo site_url('panitia/lihatDetailSeminar/'.$seminar[$i]->id)?>" class="btn pull-right">Detail Seminar</a>
          </div><!-- /.box-footer-->
        </div><!-- /.box -->
      </div>
      <?php } ?>
    </div>
     <?php
      }
    ?>
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
