<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title?>
      <!--<small>Edit data seminar</small>-->
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
        <?php //echo $this->session->flashdata('notification');?>
      </div><!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" action="<?php echo site_url('panitia/prosesEditProfil');?>" enctype="multipart/form-data" method="post">
        <div class="box-body">
            <div class="form-group">
              <label for="judul" class="col-sm-3 control-label">Nama Depan</label>
              <div class="col-sm-7">
                <input type="hidden" name="id" value="<?php echo $biodata[0]->id?>">
                <input type="text" class="form-control" id="judul" placeholder="Nama Depan" name="nama_depan" value="<?php echo $biodata[0]->nama_depan?>" required>
              </div>
            </div>
            <div class="form-group">
              <label for="pembicara" class="col-sm-3 control-label">Nama Belakang</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="pembicara" placeholder="Nama Belakang" name="nama_belakang" value="<?php echo $biodata[0]->nama_belakang?>" required>
              </div>
            </div>

            <?php
            if ($biodata[0]->jk =="L") { ?>

            <div class="form-group">
              <label for="pembicara" class="col-sm-3 control-label">Jenis Kelamin</label>
              <div class="col-sm-5">
                <div class="row">
                  <div class="col-sm-4 col-sm-offset-1">
                    <label class="radio-inline">
                      <input class="" type="radio" name="jk" id="" value="L" checked> Laki - laki
                    </label>
                  </div>
                  <div class="col-sm-4">
                    <label class="radio-inline">
                      <input class="" type="radio" name="jk" id="" value="P"> Perempuan
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <?php
              } else { 
            ?>

            <div class="form-group">
              <label for="pembicara" class="col-sm-3 control-label">Jenis Kelamin</label>
              <div class="col-sm-5">
                <div class="row">
                  <div class="col-sm-4 col-sm-offset-1">
                    <label class="radio-inline">
                      <input class="" type="radio" name="jk" id="" value="L"> Laki - laki
                    </label>
                  </div>
                  <div class="col-sm-4">
                    <label class="radio-inline">
                      <input class="" type="radio" name="jk" id="" value="P" checked> Perempuan
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <?php
                  }
                ?>
            <!--
            <?php
                  if ($biodata[0]->jk =='L') { ?>
                    <div class="form-group">
                    <fieldset>
                    <label class="radio-inline">
                      <input class="col-sm-5" type="radio" name="jk" id="" value="L" checked> Laki - laki
                    </label>
                    <label class="radio-inline">
                      <input class="col-sm-5" type="radio" name="jk" id="" value="P"> Perempuan
                    </label>
                    </fieldset>
                    </div>
                <?php
                  } else { ?>
                    <div class="form-group">
                    <fieldset>
                    <label class="radio-inline">
                      <input type="radio" name="jk" id="" value="L"> Laki - laki
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="jk" id="" value="P" checked> Perempuan
                    </label>
                    </fieldset>
                    </div>
                <?php
                  }
                ?>
                -->

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">No HP</label>
              <div class="col-sm-7">
                <input type="number" class="form-control" id="inputPassword3" placeholder="No HP" name="no_telp" value="<?php echo $biodata[0]->no_telp?>"required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Foto Profil</label>
              <div class="col-sm-7">
                <input type="hidden" name="nama_gambar" value="<?php echo $biodata[0]->foto?>">
                <img src="<?php echo base_url('uploads/panitia/').$biodata[0]->foto?>" width="150px" height="150px" class=""><br><br>
                <input type="file" class="form-control" id="inputPassword3" name="gambar">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Instansi</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="inputPassword3" placeholder="Instansi" name="instansi" value="<?php echo $biodata[0]->instansi?>"required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-7">
                  <textarea class="form-control" name="alamat" rows="4" placeholder="Alamat"><?php echo $biodata[0]->alamat?></textarea>
                </div>
            </div>

            <div class="form-group">
              <label for="judul" class="col-sm-3 control-label">Email</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="judul" placeholder="Email" name="email" value="<?php echo $biodata[0]->email?>" required>
                <input type="hidden" class="form-control" id="judul" name="password" value="<?php echo $biodata[0]->password?>">
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
              


      <!--
                <?php
                  if ($biodata[0]->jk =='L') { ?>
                    <div class="form-group has-feedback">
                    <fieldset>
                    <label class="radio-inline">
                      <input type="radio" name="jk" id="" value="L" checked> Laki - laki
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="jk" id="" value="P"> Perempuan
                    </label>
                    </fieldset>
                    </div>
                <?php
                  } else { ?>
                    <div class="form-group has-feedback">
                    <fieldset>
                    <label class="radio-inline">
                      <input type="radio" name="jk" id="" value="L"> Laki - laki
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="jk" id="" value="P" checked> Perempuan
                    </label>
                    </fieldset>
                    </div>
                <?php
                  }
                ?>
                -->

      