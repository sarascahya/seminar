<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title?>
      <small>Edit data seminar</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a class="active"><?php echo $title?></a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header">
        <?php echo $this->session->flashdata('notification');?>
      </div><!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="<?php echo site_url('seminar/prosesEditSeminar');?>" enctype="multipart/form-data" method="post">
        <div class="box-body">
          <div class="form-group">
              <label for="judul" class="col-sm-3 control-label">Judul</label>
              <div class="col-sm-7">
                <input type="hidden" name="id" value="<?php echo $seminar[0]->id?>">
                <input type="text" class="form-control" id="judul" placeholder="Judul" name="judul" value="<?php echo $seminar[0]->judul?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Tanggal</label>
              <div class="col-sm-7">
                <input type="date" class="form-control" id="inputPassword3" name="tanggal" value="<?php echo $seminar[0]->tanggal?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Deskripsi</label>
                <div class="col-sm-7">
                  <textarea class="form-control" name="deskripsi" rows="8" placeholder="Isikan deskripsi seminar anda" required><?php echo $seminar[0]->deskripsi?></textarea>
                </div>
            </div>
            <div class="form-group">
              <label for="kuota" class="col-sm-3 control-label">Kuota Peserta</label>
              <div class="col-sm-2">
                <input type="number" class="form-control" id="kuota" placeholder="Kuota Peserta" name="peserta" value="<?php echo $seminar[0]->peserta?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Harga Tiket</label>
              <div class="col-sm-7">
                <input type="number" class="form-control" id="inputPassword3" placeholder="Isikan harga tiket dalam Rupiah" name="harga" value="<?php echo $seminar[0]->harga?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Poster</label>
              <div class="col-sm-7">
                <input type="hidden" name="nama_gambar" value="<?php echo $seminar[0]->foto?>">
                <img src="<?php echo base_url('uploads/seminar/').$seminar[0]->foto?>" width="150px" height="150px" class=""><br><br>
                <input type="file" class="form-control" id="inputPassword3" name="foto">
              </div>
            </div>
            
          </div><!-- /.box-body -->
          <div class="box-footer">
            <a type="submit" class="btn btn-danger btn-flat col-sm-1 col-sm-offset-5" href="javascript:history.go(-1)">Batal</a>
            <button type="submit" class="btn btn-info btn-flat col-sm-1 col-sm-offset-1">Edit</button>
          </div><!-- /.box-footer -->
        </form>
      </div><!-- /.box -->
    </section>
  </div>
              