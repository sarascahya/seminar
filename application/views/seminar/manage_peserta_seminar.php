<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title;?>
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('panitia')?>"></i>Home</a></li>
      <li><a href="<?php echo site_url('panitia/lihatSeminarById')?>">Manage Seminar</a></li>
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
        
          
            
            <br>

            <!-- peserta start-->
            <div class="row">
              <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab"><b>Semua Peserta Terdaftar</b></a></li>
                  <li><a href="#tab_2" data-toggle="tab"><b>Peserta Sudah Bayar</b></a></li>
                  <li><a href="#tab_3" data-toggle="tab"><b>Peserta Belum Bayar</b></a></li>
                  <li><a href="#tab_4" data-toggle="tab"><b>Absensi Peserta</b></a></li>
                  <li><a href="#tab_5" data-toggle="tab"><b>Peserta Hadir</b></a></li>
                  <li class="pull-right"><a href="javascript:history.go(-1)">Kembali</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <?php 
                        if ($jml_peserta>0) {
                      ?>
                      <h4>Total : <?php echo $jml_peserta;?></h4>
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
                    <?php
                      } else {
                        echo "<h5>Belum ada peserta yang mendaftar</h5>";
                      }
                    ?>
                  </div><!-- /.tab-pane -->


                  <div class="tab-pane" id="tab_2">
                    <?php 
                        if ($jml_peserta_bayar>0) {
                        ?>
                        <h4>Total : <?php echo $jml_peserta_bayar;?></h4>
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
                      <?php 
                        } else { 
                          echo "<h5>Tidak ada peserta yang sudah membayar</h5>";
                        }
                      ?>
                  </div><!-- /.tab-pane -->


                  <div class="tab-pane" id="tab_3">
                    <?php 
                        if ($jml_peserta_blm_bayar>0) {
                        ?>
                        <h4>Total : <?php echo $jml_peserta_blm_bayar;?></h4>
                          <table class="table table-striped">
                            <tr>
                              <th>No</th>
                              <th>Nama Peserta</th>
                              <th>Email</th>
                              <th>No HP</th>
                              <th>Instansi</th>
                              <th>Tanggal Daftar</th>
                              <th>Status</th>
                              <th><center>Ubah Status</center></th>
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
                              <td><center><a href="<?php echo site_url('panitia/formInputTglBayar/').$peserta->id_peserta_seminar."/".$peserta->id_seminar;?>" class="btn btn-danger btn-flat"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></center></td>
                            </tr>
                            <?php $no++;} ?>
                          </table>
                        <?php
                        } else {
                          echo "<h5>Tidak ada peserta yang belum membayar</h5>";
                        }
                      ?>
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="tab_4">
                    <?php 
                        if ($jml_peserta_bayar>0) {
                        ?>
                        <h4>Total : <?php echo $jml_peserta_bayar;?></h4>
                          <table class="table table-striped">
                          <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Instansi</th>
                            <th>Tanggal Daftar</th>
                            <th>Status</th>
                            <th><center>Absen</center></th>
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
                            <td><center><a href="" class="btn btn-success btn-flat"><span class="glyphicon glyphicon-check" aria-hidden="true"></span></a></center></td>
                            
                          </tr>
                          <?php $no++;} ?>
                        </table>
                      <?php 
                        } else { 
                          echo "<h5>Belum ada peserta yang melunasi pembayaran</h5>";
                        }
                      ?>
                  </div>

                  <div class="tab-pane" id="tab_5">
                    
                  </div>


                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
            </div>

            <!-- peserta end-->

            

          

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
