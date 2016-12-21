<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left">
              <!--
              <?php
              //echo $this->session->userdata('foto');
                if ($this->session->userdata('foto')=="") { ?>
                  <img src="<?php echo base_url('uploads/peserta/peserta.jpg')?>" class="img-circle" width="50" height="50">
                <?php
                } else {
                ?>
                  <img src="<?php echo base_url('uploads/peserta/').$this->session->userdata('foto');?>" class="img-circle" width="50" height="50">
                <?php
                 }
                ?>
              <?php //echo base_url('uploads/panitia/').$this->session->userdata('foto');?>-->
              <img src="<?php echo base_url('uploads/peserta/').$this->session->userdata('foto');?>" class="img-circle" width="50" height="50">
            </div>

            
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('nama_panggilan'); ?></p>
              <a><i class="fa fa-circle text-success"></i> Online</a>
            </div>
            
          </div>
          <!-- search form -->
          <!--
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          -->
          <!-- /.search form -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li class="treeview">
              <a href="<?php echo site_url('peserta');?>">
                <i class="fa fa-file-o"></i> <span>Seminar Saya</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo site_url('peserta/lihatSemuaSeminar');?>">
                <i class="fa fa-file"></i> <span>Semua Seminar</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo site_url('peserta/profilPeserta');?>">
                <i class="fa fa-user"></i>
                <span>Profil</span>
              </a>
            </li>

            <li class="treeview">
              <a href="<?php echo site_url('peserta/logoutPeserta');?>">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
                <!--<span class="label label-primary pull-right">4</span>-->
              </a>
            </li>
            
        </section>
        <!-- /.sidebar -->
      </aside>