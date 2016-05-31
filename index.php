<?php
error_reporting(0);
session_start();
if(isset($_SESSION['nip'])){
	echo "<script>document.location.href='main.php?mod=dashboard';</script>";
}else{
	include_once "__class/db.php";
	$dbase = new db();

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$FUSER = $_POST['FUSER'];
		$FPASS = $_POST['FPASS'];
		$login = $dbase->check_login($FUSER, $FPASS);
		if($login){
			echo "<script>document.location.href='main.php?mod=dashboard';</script>";
		}else{
			echo "<script>document.location.href='index.php?failed';</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Sistem Pendukung Keputusan</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">
  <script src="js/jquery.min.js"></script>
</head>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
				<?php if(isset($_GET['failed']) or isset($_GET['error'])){  ?>
				<div class="alert alert-danger alert-dismissible fade in" role="alert" style="text-align:center;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
					<?php
					if(isset($_GET['failed'])){
						echo "<strong>Login Gagal!</strong> <br/>Username atau Password tidak terdaftar!";
					}else if(isset($_GET['error'])){
						echo "<strong>Anda Belum Login</strong> <br/>Silahkan Login terlebih dahulu!";
					}
					?>
				</div>
				<?php } ?>
        <section class="login_content">
          <form action="#" method="POST">
            <h1>Login User</h1>
            <div>
              <input type="text" name="FUSER" class="form-control" placeholder="Username" required="" />
            </div>
            <div>
              <input type="password" name="FPASS" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
							<input type="submit" name="login" class="btn btn-default submit" value="Login" />
            </div>
            <div class="clearfix"></div>
            <div class="separator">
              <br />
              <div>
                <h1><!--<i class="fa fa-paw" style="font-size: 26px;"></i>--> Sistem Pendukung Keputusan!</h1>

                <p>©2016 All Rights Reserved. Sistem Pendukung Keputusan!</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>

</body>

</html>
<?php
}
?>
