      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><?php echo $title?></a></li>
            <!--<li class="active">Blank page</li>-->
          </ol>
        </section>
        
        <!-- Main content -->
        <section class="content">
        <?php
        if ($jml_data == 0) {
      	 	echo "<h4>Anda belum mendaftar di seminar apapun, silahkan mendaftar</h4>";
      	 } else {
        ?>
        <script type="text/javascript">
		      <?php echo $this->session->flashdata('notification');?>
          <?php //echo $this->session->flashdata('notif');?>
		    </script>

		    <div class="row">
      <?php
      //echo "jumlah data : ".$jml_data;
        foreach ($seminar_saya as $seminar){
      ?>
      <div class="col-xs-6">
        <!-- Default box -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $seminar->judul?></h3>
            <div class="box-tools pull-right">
              <!--<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimize"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-4">
                <img src="<?php echo base_url('uploads/seminar/').$seminar->foto;?>" width="150" height="150">
              </div>
              <div class="col-xs-8">
                <table class="table table-striped">
                  <tr>
                    <th>Tanggal Seminar</th>
                    <td><?php echo $seminar->tanggal?></td>
                  </tr>
                  <tr>
                    <th>Harga Tiket</th>
                    <td><?php echo $seminar->harga?></td>
                  </tr>
                  <tr>
                  	<?php 
                    	if ($seminar->status_bayar == 0) {?>
	                  		<div class="alert alert-danger alert-dismissable">
	                    		<h4><i class="icon fa fa-warning"></i> Lakukan pembayaran!</h4>
	                    		Segera Lakukan Pembayaran seminar anda
	                  		</div>
	                  	<?php } else { ?>
	                  		<div class="alert alert-info alert-dismissable">
	                    		<h4><i class="icon fa fa-check"></i>Lunas!</h4>
	                    		Kami tunggu anda di seminar kami
	                  		</div>
	                  	<?php } ?>
                  </tr>
                  <!--
                  <tr>
                    <th>Status Pembayaran</th>
                    <?php 
                    	if ($seminar->status == 0) {
                    		echo "<td><h4>Belum Lunas</h4></td>";
                    	} else {
                    		echo "<td><h4>Sudah Lunas</h4></td>";
                    	}
                    ?>
                    <td><h4></h4></td>
                  </tr>
                  -->  
                  
                </table>
              </div>
            </div>
          </div><!-- /.box-body -->
          <div class="box-footer">
            <!--<a class="btn btn-success btn-flat" href="<?php echo site_url('peserta/ikutiSeminar/'.$sem->id)?>">Ikuti Seminar</a>-->
            <?php
            if ($seminar->status_bayar == 0) {?>
            <a onclick="batalIkut('<?php echo $seminar->id_seminar; ?>')" class="btn btn-success btn-flat">Batal Ikuti Seminar</a>
            <?php } ?>
              
            <a href="<?php echo site_url('peserta/detailSeminarSayaPeserta/'.$seminar->id_seminar)?>" class="btn pull-right">Detail Seminar</a>
          </div><!-- /.box-footer-->
        </div><!-- /.box -->
      </div>
      <?php
        }
    }
      ?>
    </div> 
		    	
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<script type="text/javascript">
  function batalIkut(id){
    swal({
      title: "Yakin ingin membatalkan pendaftaran ?",
      text: "Data anda akan dihapus dari seminar",
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
        var link = "<?php echo site_url('peserta/batalIkutSeminar/'); ?>"+id;
        window.location = link;
        //swal("Terhapus!", "Data seminar berhasil dihapus", "success");
      } else {
        swal("Batal", "Anda membatalkan", "error");
      }
    });
  }
</script>