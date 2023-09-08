<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-navy elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link bg-navy" style="text-align: center;">
      <span class="brand-text font-weight-weight">ADMIN PANELI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php print $_SESSION['firstname']."&nbsp;".$_SESSION['lastname']?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                KURUMSAL
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./hakkimizda" class="nav-link <?php if($_GET['route'] == "hakkimizda") {print "active";} else [] ;?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hakkımızda</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./misyonumuz" class="nav-link <?php if($_GET['route'] == "misyonumuz") {print "active";} ;?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Misyonumuz</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./vizyonumuz" class="nav-link <?php if($_GET['route'] == "vizyonumuz") {print "active";} ;?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vizyonumuz</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./referanslar" class="nav-link <?php if($_GET['route'] == "referanslar") {print "active";} ;?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Referanslar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                HİZMETLERİMİZ
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./webtasarim" class="nav-link <?php if($_GET['route'] == "webtasarim") {print "active";} ;?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Web Tasarım</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./eticaret" class="nav-link <?php if($_GET['route'] == "eticaret") {print "active";} ;?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-Ticaret</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./mobiluygulama" class="nav-link <?php if($_GET['route'] == "mobiluygulama") {print "active";} ;?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mobil Uygulama</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                ÜRÜNLERİMİZ
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./kategoriler" class="nav-link <?php if($_GET['route'] == "kategoriler") {print "active";} ;?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategoriler</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./urunler" class="nav-link <?php if($_GET['route'] == "urunler") {print "active";} ;?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ürünler</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./mobiluygulama" class="nav-link <?php if($_GET['route'] == "mobiluygulama") {print "active";} ;?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mobil Uygulama</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                GALERİ
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./resimgaleri" class="nav-link <?php if($_GET['route'] == "resimgaleri") {print "active";} ;?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Resim Galeri</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./videogaleri" class="nav-link <?php if($_GET['route'] == "videogaleri") {print "active";} ;?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Video Galeri</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                İLETİŞİM
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./resimgaleri" class="nav-link <?php if($_GET['route'] == "resimgaleri") {print "active";} ;?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Resim Galeri</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./videogaleri" class="nav-link <?php if($_GET['route'] == "videogaleri") {print "active";} ;?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Video Galeri</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                PROFİL İŞLEMLERİ
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./resimgaleri" class="nav-link <?php if($_GET['route'] == "resimgaleri") {print "active";} ;?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Resim Galeri</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./videogaleri" class="nav-link <?php if($_GET['route'] == "videogaleri") {print "active";} ;?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Video Galeri</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>