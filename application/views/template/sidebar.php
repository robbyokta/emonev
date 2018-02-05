<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo site_url()?>" class="site_title"><i class="fa fa-check-square"></i> <span>   E-Monev <small></small></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $pengguna->nama_skpd; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php if ($pengguna->role == '2'){  ?>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-file-text"></i>Master Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('mtr_program')?>">Master Data Program</a></li>
                      <li><a href="<?php echo site_url('mtr_kegiatan')?>">Master Data Kegiatan</a></li>
                      <li><a href="<?php echo site_url('mtr_pengadaan')?>">Master Data Pengadaan</a></li>
                      <li><a href="<?php echo site_url('mtr_belanjamodal')?>">Master Data Belanja Modal</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-fax"></i>Data Realisasi<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('rl_kegiatan')?>">Realisasi Kegiatan</a></li>
                      <li><a href="<?php echo site_url('rl_pengadaan')?>">Realisasi Pengadaan</a></li>
                      <li><a href="<?php echo site_url('rl_bljmodal')?>">Realisasi Belanja Modal</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file-pdf-o"></i>Laporan<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('rekap')?>">Laporan Belanja</a></li>
                    </ul>
                  </li> 
                </ul>
              </div>
            </div>
             <?php } else if ($pengguna->role = '1'){ ?>
             <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-file-text"></i>Master Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('mtr_program')?>">Master Data Program</a></li>
                      <li><a href="<?php echo site_url('mtr_kegiatan')?>">Master Data Kegiatan</a></li>
                      <li><a href="<?php echo site_url('mtr_pengadaan')?>">Master Data Pengadaan</a></li>
                      <li><a href="<?php echo site_url('mtr_belanjamodal')?>">Master Data Belanja Modal</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-fax"></i>Data Realisasi<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('rl_kegiatan')?>">Realisasi Kegiatan</a></li>
                      <li><a href="<?php echo site_url('rl_pengadaan')?>">Realisasi Pengadaan</a></li>
                      <li><a href="<?php echo site_url('rl_bljmodal')?>">Realisasi Belanja Modal</a></li>
                    </ul>
                  </li> 
                  <li><a><i class="fa fa-file-pdf-o"></i>Laporan<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('rekap')?>">Laporan Belanja</a></li>
                      <li><a href="<?php echo site_url('rekap/rekapskpd')?>">Rekap SKPD</a></li>
                    </ul>
                  </li> 
                  <li><a><i class="fa fa-user"></i>Seting & Users<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('mtr_user/settingapp')?>">Setting Aplikasi</a></li>
                      <li><a href="<?php echo site_url('mtr_user')?>">Data Users</a></li>
                    </ul>
                  </li>

                </ul>
              </div>
            </div>
            <?php } ?>
            <!-- sidebar menu -->

            
          </div>
        </div>