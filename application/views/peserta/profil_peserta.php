<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $biodata[0]->nama_lengkap;?>
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
          <!--
          <div class="box-header with-border">
            <h3 class="box-title"></h3>

            
          </div>
          -->
        

          <div class="box-body">
            <div class="row">
              <div class="col-xs-3">
                <center><img src="<?php echo base_url('uploads/peserta/').$biodata[0]->foto;?>" width="200" height="200" class="img-thumnail"></center>
              </div>
              <div class="col-xs-9">
                <table class="table table-striped">
                  <tr>
                    <th class="col-xs-4">Nama Lengkap</th>
                    <td class="col-xs-8"><?php echo $biodata[0]->nama_lengkap;?></td>
                  </tr>
                  <tr>
                    <th class="col-xs-4">Nama Panggilan</th>
                    <td class="col-xs-8"><?php echo $biodata[0]->nama_panggilan;?></td>
                  </tr>
                  <tr>
                    <th class="col-xs-4">Jenis Kelamin</th>
                    <?php
                      if ($biodata[0]->jk == "L") {
                        echo "<td class='col-xs-8'>Laki - laki</td>";
                      } else {
                        echo "<td class='col-xs-8'>Perempuan</td>";
                      }
                    ?>
                    <!--<td class="col-xs-8"><?php echo $biodata[0]->jk;?></td>-->
                  </tr>
                  <tr>
                    <th class="col-xs-4">Instansi</th>
                    <td class="col-xs-8"><?php echo $biodata[0]->instansi;?></td>
                  </tr>   
                  <tr>
                    <th class="col-xs-4">Alamat</th>
                    <td class="col-xs-8"><?php echo $biodata[0]->alamat;?></td>
                  </tr>
                  <tr>
                    <th class="col-xs-4">No HP</th>
                    <td class="col-xs-8"><?php echo $biodata[0]->no_telp;?></td>
                  </tr> 
                  <tr>
                    <th class="col-xs-4">Email</th>
                    <td class="col-xs-8"><?php echo $biodata[0]->email;?></td>
                  </tr> 
                </table>
              </div>
            </div>

          </div><!-- /.box-body -->
          <div class="box-footer">
            <a class="btn btn-success btn-flat pull-right" href="<?php echo site_url('peserta/editProfil/'.$biodata[0]->id)?>">Edit Profil</a>
            <!--<a class="btn btn-danger btn-flat" href="<?php echo site_url('peserta/hapusSeminar/'.$sem->id)?>">Hapus</a>
            <a onclick="hapus('<?php echo $seminar[0]->id; ?>')" class="btn btn-danger btn-flat"> Hapus</a>
            <a href="javascript:history.go(-1)" class="pull-right">Kembali ke Semua Seminar</a>
            -->
          </div><!-- /.box-footer-->
        </div><!-- /.box -->
      </div>
    </div> 
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->