    <div class="wrapper"><!-- wrapper begin -->
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      <div class="app-sidebar menu-fixed" data-background-color="man-of-steel" data-image="<?= base_url('assets/admin-asset/app-assets/img/sidebar-bg/01.jpg'); ?>" data-scroll-to-active="true">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
          <div class="logo clearfix">
            <a class="logo-text float-left" href="index.php">
              <div class="logo-img">
                <img src="<?= base_url('assets/admin-asset/app-assets/img/logo.png'); ?>" alt="Apex Logo"/>
              </div>
              <span class="text">Az Corp</span>
            </a>
            <a class="nav-toggle d-none d-lg-none d-xl-block" id="sidebarToggle" href="javascript:;">
              <i class="toggle-icon ft-toggle-right" data-toggle="expanded"></i>
            </a>
            <a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose" href="javascript:;">
              <i class="ft-x"></i>
            </a>
          </div>
        </div>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content main-menu-content">
          <div class="nav-container">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class=" nav-item">
                <a href="index.php">
                  <i class="ft-home"></i>
                  <span class="menu-title" data-i18n="Email">Dashboard</span>
                </a>
              </li>
              <?php if($this->session->userdata('id_divisi')==1 && $this->session->userdata('id_roles')==2){ ?>
              <li class=" nav-item">
                <a href="<?= base_url('user/laporanPerbaikan'); ?>">
                  <i class="fa fa-wrench"></i>
                  <span class="menu-title" data-i18n="Email">Laporan Perbaikan</span>
                </a>
              </li>
            <?php } ?>
            <?php if($this->session->userdata('id_divisi')!=1  && $this->session->userdata('id_roles')==2){ ?>
              <li class=" nav-item">
                <a href="<?= base_url('user/laporanKerusakan'); ?>">
                  <i class="fa fa-cog"></i>
                  <span class="menu-title" data-i18n="Chat">Laporan Kerusakan</span>
                </a>
              </li>
            <?php } ?>
              <?php if($this->session->userdata('id_roles')==1){ ?>
                <li class=" nav-item">
                <a href="<?= base_url('admin/laporanPerbaikan'); ?>">
                  <i class="fa fa-wrench"></i>
                  <span class="menu-title" data-i18n="Email">Laporan Perbaikan</span>
                </a>
              </li>
              <li class=" nav-item">
                <a href="<?= base_url('admin/laporanKerusakan'); ?>">
                  <i class="fa fa-cog"></i>
                  <span class="menu-title" data-i18n="Chat">Laporan Kerusakan</span>
                </a>
              </li>
              <li class=" nav-item">
                <a href="<?= base_url('admin/user_management'); ?>">
                  <i class="fa fa-user-plus"></i>
                  <span class="menu-title" data-i18n="Chat">Manajemen User</span>
                </a>
              </li>
              <li class=" nav-item">
                <a href="<?= base_url('admin/divisi'); ?>">
                  <i class="fa fa-users"></i>
                  <span class="menu-title" data-i18n="Chat">Manajemen Divisi</span>
                </a>
              </li>
              <li class=" nav-item">
                <a href="<?= base_url('admin/kategori'); ?>">
                  <i class="fa fa-wrench"></i>
                  <span class="menu-title" data-i18n="Chat">Manajemen Kategori</span>
                </a>
              </li>
              <li class=" nav-item">
                <a href="<?= base_url('admin/item'); ?>">
                  <i class="fa fa-cog"></i>
                  <span class="menu-title" data-i18n="Chat">Manajemen Item</span>
                </a>
              </li>
              <li class=" nav-item">
                <a href="<?= base_url('admin/lokasi'); ?>">
                  <i class="fa fa-map-marker"></i>
                  <span class="menu-title" data-i18n="Chat">Manajemen Lokasi</span>
                </a>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
        <!-- / main menu-->
      </div>
      <div class="main-panel"> <!-- main panel begin -->