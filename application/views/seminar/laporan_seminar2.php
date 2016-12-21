<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title;?>
      <small></small>
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

        <!--
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $seminar[0]->judul;?></h3>

            <div class="box-tools pull-right">
             
            </div>
          </div>-->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-4">
                <center><img src="<?php echo base_url('uploads/seminar/').$seminar[0]->foto;?>" width="300" height="250"></center>
              </div>
              <div class="col-xs-8">
                <table class="table table-striped">
                  <tr>
                    <th class="col-xs-4">Panitia</th>
                    <td class="col-xs-8"><?php echo $semua_peserta['jml_peserta'];?></td>
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
            </div>
            <br>

            <!--peserta-->
                   <table class="table table-striped">
                      <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                        <th>Email</th>
                        <th>No HP</th>
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
                        <td><?php echo $peserta->email;?></td>
                        <td><?php echo $peserta->no_telp;?></td>
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
                    

                          <table class="table table-striped">
                          <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Instansi</th>
                            <th>Tanggal Daftar</th>
                            <th>Status</th>
                          </tr>
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
                            <td>Lunas</td>
                            
                          </tr>
                          <?php $no++;} ?>
                        </table>
                      
                          <table class="table table-striped">
                            <tr>
                              <th>No</th>
                              <th>Nama Peserta</th>
                              <th>Email</th>
                              <th>No HP</th>
                              <th>Instansi</th>
                              <th>Tanggal Daftar</th>
                              <th>Status</th>
                            </tr>
                            <?php
                              $no=1;
                              foreach ($semua_peserta_blm_bayar as $peserta) {
                                # code...
                              
                            ?>
                            <tr>
                              <td><?php echo $no;?></td>
                              <td><?php echo $peserta->nama_lengkap;?></td>
                              <td><?php echo $peserta->email;?></td>
                              <td><?php echo $peserta->no_telp;?></td>
                              <td><?php echo $peserta->instansi;?></td>
                              <td><?php echo $peserta->tgl_daftar;?></td>
                              <td style="color:red;"><b>Belum Lunas</b></td>
                              
                            </tr>
                            <?php $no++;} ?>
                          </table>
                   
                   
            <!--end of peserta-->

            
          </div><!-- /.box-body -->
          <div class="box-footer">
            
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
