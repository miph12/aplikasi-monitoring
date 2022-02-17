  <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION[nama_anggota]; ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
            
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <?php 
          if ($_SESSION['bagian'] == 'Ketua Panitia') {
          
           ?>
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            </li>
            <li><a href="index.php?page=pages/anggota/anggota"><i class="fa fa-book"></i> Anggota </a></li>
            <li><a href="index.php?page=pages/devisi/devisi"><i class="fa fa-list"></i> Devisi </a></li>
            <li><a href="index.php?page=pages/tugas/tugas"><i class="fa fa-list"></i> Tugas </a></li>
            <hr>
            <li><a href="index.php?page=pages/pembagian/pembagian"><i class="glyphicon glyphicon-hand-right"></i> Pembagian Tugas </a></li>
            <li><a href="index.php?page=pages/monitoring/monitoring"><i class="glyphicon glyphicon-eye-open"></i> Monitor Pekerjaan </a></li>
            <hr>
            <!-- <li><a href="index.php?page=pages/tugas/tugas_saya"><i class="glyphicon glyphicon-eye-open"></i> Tugas Saya </a></li> -->
          </ul>
            <?php } else { 
              ?>

            <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            </li>
            <!-- <li><a href="index.php?page=pages/anggota/anggota"><i class="fa fa-book"></i> Anggota </a></li>
            <li><a href="index.php?page=pages/devisi/devisi"><i class="fa fa-list"></i> Devisi </a></li>
            <li><a href="index.php?page=pages/tugas/tugas"><i class="fa fa-list"></i> Tugas </a></li>
             
            <!-- <li><a href="index.php?page=pages/pembagian/pembagian"><i class="glyphicon glyphicon-hand-right"></i> Pembagian Tugas </a></li>
            <li><a href="index.php?page=pages/monitoring/monitoring"><i class="glyphicon glyphicon-eye-open"></i> Monitor Pekerjaan </a></li> -->
            <hr>
            <li><a href="index.php?page=pages/tugas/tugas_saya"><i class="glyphicon glyphicon-eye-open"></i> Tugas Saya </a></li>
            <hr>
          </ul>
          <?php } ?>
            
            
        </section>
        <!-- /.sidebar -->
      </aside>