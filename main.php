<?php
session_start();
error_reporting(0);
if(empty($_SESSION['username']) AND empty($_SESSION['password'])){
  session_unset();
  session_destroy();
  echo "<script>document.location.href='index.php?error';</script>";
}else{
  include_once "config.php";

  //deklarasi
  $admin = $_SESSION['admin'];
  $name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Pendukung Keputusan!</title>
  <?php include_once "TopResource.php"; ?>
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="?mod=dashboard" class="site_title"><i class="fa fa-book"></i> <span>SPK!</span></a>
          </div>
          <div class="clearfix"></div>
          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Selamat Datang,</span>
              <h2><?php echo $name; ?></h2>
            </div>
          </div>
          <div class="clearfix"></div>
          <!-- /menu prile quick info -->
          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="?mod=dashboard"><i class="fa fa-home"></i> Beranda</a></li>
                <?php if($admin==1){ ?>
                <li><a><i class="fa fa-table"></i> Master <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="?mod=car">Master Car</a></li>
                    <li><a href="?mod=fuel">Master Fuel</a></li>
                    <li><a href="?mod=model">Master Model</a></li>
                    <li><a href="?mod=color">Master Color</a></li>
                    <li><a href="?mod=transmission">Master Transmission</a></li>
                    <li><a href="?mod=users">Master Users</a></li>
                  </ul>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" href="logout.php" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt=""><?php echo $name; ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="javascript:;">Profile</a>
                  </li>
                  <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Sistem Pendukung Keputusan Jenis Mobil Baru</h3>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <!-- MOD CONTENT -->
              <?php
  						if(empty($_GET['mod'])){ include'mod/mod_dashboard/default.php'; }
  						elseif($_GET['mod']=='car'){ include'mod/mod_car/default.php'; }
  						elseif($_GET['mod']=='fuel'){ include'mod/mod_fuel/default.php'; }
  						elseif($_GET['mod']=='model'){ include'mod/mod_model/default.php'; }
  						elseif($_GET['mod']=='color'){ include'mod/mod_color/default.php'; }
  						elseif($_GET['mod']=='user'){ include'mod/mod_user/default.php'; }
  						elseif($_GET['mod']=='transmission'){ include'mod/mod_transmission/default.php'; }
  						else {include'mod/mod_dashboard/default.php';}
  						?>
              <!-- END MOD CONTENT -->

              <!-- footer content -->
              <footer>
                <div class="copyright-info">
                  <p class="pull-right">&copy; 2016 Sistem Pendukung Keputusan Jenis Mobil Baru Powered By Six Team</p>
                </div>
                <div class="clearfix"></div>
              </footer>
              <!-- /footer content -->
            </div>
            <!-- /page content -->
          </div>
        </div>
        <div id="custom_notifications" class="custom-notifications dsp_none">
          <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
          </ul>
          <div class="clearfix"></div>
          <div id="notif-group" class="tabbed_notifications"></div>
        </div>
        <script src="js/bootstrap.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>
        <script src="js/custom.js"></script>
        <?php include_once "BottomResource.php"; ?>
</body>
</html>
<?php
}

?>
