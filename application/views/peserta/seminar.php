<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title;?>
    </h1>
    <ol class="breadcrumb">
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
      <div class="col-lg-12">
        <form method="POST" action="<?php echo site_url('peserta/cariSeminar'); ?>">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari Seminar..." name="cari" value="<?php echo $this->session->flashdata('cari'); ?>" >
            <span class="input-group-btn">
              <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-search"></span></button>
              <a href="<?php echo site_url('peserta/lihatSemuaSeminar'); ?>" class="btn btn-info"><span class="glyphicon glyphicon-refresh"></span></a>
            </span>
          </div>
        </form>
      </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
    <br>
    
    <div class="row">
      <?php 
      //echo "jumlah data : ".$jml_data;
        //foreach ($seminar as $sem){
      for ($i=0; $i < $jml_data; $i++) { 
      ?>
      <div class="col-xs-6">
        <!-- Default box -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $seminar[$i]->judul;?></h3>
            <div class="box-tools pull-right">
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

                    <td><?php echo $seminar[$i]->tanggal;
                        //echo "<br>".$tanggal;

                    ?></td>
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
                        <div class="progress-bar progress-bar-success" style="width: <?php echo $kuota_peserta[$i].'%'; ?>"></div>
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
            <!--<a class="btn btn-success btn-flat" href="<?php echo site_url('peserta/ikutiSeminar/'.$sem->id)?>">Ikuti Seminar</a>-->
            <?php
              if ($kuota_peserta[$i]<100) { ?>

              <a onclick="ikut('<?php echo $seminar[$i]->id?>')" class="btn btn-success btn-flat">Daftar Seminar</a>
            <?php
              }
            ?>
            
            <a href="<?php echo site_url('peserta/detailSeminarPeserta/'.$seminar[$i]->id)?>" class="btn pull-right">Detail Seminar</a>
          </div><!-- /.box-footer-->
        </div><!-- /.box -->
      </div>
      <?php
        }
      ?>
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
