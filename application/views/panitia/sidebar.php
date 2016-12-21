<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left">
              <img src="<?php echo base_url('uploads/panitia/').$this->session->userdata('foto');?>" class="img-circle" width="50" height="50">
              <?php //echo base_url('uploads/panitia/').$this->session->userdata('foto');?>
            </div>
            
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('username'); ?></p>
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
              <a href="<?php echo site_url('panitia/index');?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>

            <li class="treeview">
              <a href="<?php echo site_url('panitia/profilPanitia');?>">
                <i class="fa fa-user"></i>
                <span>Profil</span>
                <!--<span class="label label-primary pull-right">4</span>-->
              </a>
            </li>

            <li class="treeview">
              <a href="<?php echo site_url('panitia/lihatSeminarbyId');?>">
                <i class="fa fa-file"></i>
                <span>Manage Seminar</span>
              </a>
            </li>

            <!-- <li class="treeview">
              <a href="<?php //echo site_url('');?>">
                <i class="fa fa-edit"></i>
                <span>Absensi</span>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <span class="glyphicon glyphicon-duplicate"></span>
                <span>Laporan</span>
                
              </a>
            </li> -->

            <li class="treeview">
              <a href="<?php echo site_url('panitia/logoutPanitia');?>">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
                <!--<span class="label label-primary pull-right">4</span>-->
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>