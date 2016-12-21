<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title; ?>
      <!--<small>Tambahkan data seminar</small>-->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a class="active"><?php echo $title;?></a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header">
        <?php //echo $this->session->flashdata('notification');?>
        <!--<h3 class="box-title"></h3>-->
      </div><!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="<?php echo site_url('panitia/ubahStatusBayar');?>" method="post">
        <div class="box-body">
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Bayar</label>
              <div class="col-sm-7">
              	<input type="hidden" name="id_seminar" value="<?php echo $id_seminar;?>">
              	<input type="hidden" class="form-control" id="inputPassword3" name="id_peserta_seminar" value="<?php echo $id_peserta_seminar;?>">
                <input type="date" class="form-control" id="inputPassword3" name="tgl_bayar" required>
              </div>
            </div>
            
        </div><!-- /.box-body -->
          <div class="box-footer">
            <a type="submit" class="btn btn-danger btn-flat col-sm-1 col-sm-offset-5" href="javascript:history.go(-1)">Batal</a>
            <button type="submit" class="btn btn-info btn-flat col-sm-1 col-sm-offset-1">Tambah</button>
          </div><!-- /.box-footer -->
      </form>
    </div><!-- /.box -->
  </section>
</div>
              