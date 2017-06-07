<?php
include "../lib/config.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
} else { ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Administrator Project Ecommerce</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.5 -->
		<link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- jvectormap -->
		<link rel="stylesheet" href="asset/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="asset/dist/css/AdminLTE.min.css">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="asset/dist/css/skins/_all-skins.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">

			<header class="main-header">

				<!-- Logo -->
				<a href="index2.html" class="logo"> <!-- mini logo for sidebar mini 50x50 pixels --> <span class="logo-mini"><b>A</b>LT</span> <!-- logo for regular state and mobile devices --> <span class="logo-lg"><b>Admin</b>Sistem</span> </a>

				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- Messages: style can be found in dropdown.less-->
		
							<!-- Notifications: style can be found in dropdown.less -->
			
							<!-- Tasks: style can be found in dropdown.less -->
							<li>
							<a href="#"><i class="fa fa-globe"></i></a>
					
							</li>
							<!-- User Account: style can be found in dropdown.less -->
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="asset/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> <span class="hidden-xs">Alexander Pierce</span> </a>
								<ul class="dropdown-menu">
									<!-- User image -->
									<li class="user-header">
										<img src="asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
										<p>
											Alexander Pierce - Web Developer
											<small>Member since Nov. 2012</small>
										</p>
									</li>
									<!-- Menu Body -->
									<li class="user-body">
										<div class="col-xs-4 text-center">
											<a href="#">Followers</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Sales</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Friends</a>
										</div>
									</li>
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-left">
											<a href="#" class="btn btn-default btn-flat">Profile</a>
										</div>
										<div class="pull-right">
											<a href="#" class="btn btn-default btn-flat">Sign out</a>
										</div>
									</li>
								</ul>
							</li>
							<!-- Control Sidebar Toggle Button -->
							
						</ul>
					</div>

				</nav>
			</header>
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- Sidebar user panel -->
					<div class="user-panel">
						<div class="pull-left image">
							<img src="asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
						</div>
						<div class="pull-left info">
							<p>
								Alexander Pierce
							</p>
							<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
						</div>
					</div>
					<!-- search form -->
					<form action="#" method="get" class="sidebar-form">
						<div class="input-group">
							<input type="text" name="q" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
								<button type="submit" name="search" id="search-btn" class="btn btn-flat">
									<i class="fa fa-search"></i>
								</button> </span>
						</div>
					</form>
					<!-- /.search form -->
					<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<li class="header">
							MAIN NAVIGATION
						</li>

						<li>
							<a href="adminweb.php?module=home"> <i class="fa fa-home"></i> <span>Home</span> </a>
						</li>
						<li>
							<a href="adminweb.php?module=kategori"> <i class="fa fa-bars"></i> <span>Kategori</span> </a>
						</li>
						<li>
							<a href="adminweb.php?module=merek"> <i class="fa fa-eye"></i> <span>Merek</span> </a>
						</li>
						<li>
							<a href="adminweb.php?module=produk"> <i class="fa fa-th"></i> <span>Produk</span> </a>
						</li>
							<li>
							<a href="adminweb.php?module=biaya"> <i class="fa fa-car"></i> <span>Biaya Kirim</span> </a>
						</li>
							<li>
							<a href="adminweb.php?module=pesanan"> <i class="fa fa-money"></i> <span>Pesanan</span> </a>
						</li>
							<li>
							<a href="adminweb.php?module=produk"> <i class="fa fa-bar-chart"></i> <span>Penjualan</span> </a>
						</li>
							<li>
							<a href="adminweb.php?module=member"> <i class="fa fa-users"></i> <span>Member</span> </a>
						</li>
							<li>
							<a href="adminweb.php?module=admin"> <i class="fa fa-cog"></i> <span>Admin</span> </a>
						</li>
						<li>
							<a href="logout.php"> <i class="fa fa-power-off"></i> <span>LogOut</span> </a>
						</li>

					

					</ul>
				</section>
				<!-- /.sidebar -->
			</aside>
			<?php
            if ($_GET['module'] == 'home') {
                include "module/home/home.php";
            } elseif ($_GET['module'] == 'kategori') {
                include "module/kategori/list_kategori.php";
            } elseif ($_GET['module'] == 'tambah_kategori') {
                include "module/kategori/form_tambah.php";
            } elseif ($_GET['module'] == 'edit_kategori') {
                include "module/kategori/form_edit.php";
				
            } elseif ($_GET['module'] == 'produk') {
                include "module/produk/list_produk.php";
            } elseif ($_GET['module'] == 'tambah_produk') {
                include "module/produk/form_tambah.php";
            } elseif ($_GET['module'] == 'edit_produk') {
                include "module/produk/form_edit.php";
}
			
			elseif ($_GET['module'] == 'merek') {
                include "module/merek/list_merek.php";

            } elseif ($_GET['module'] == 'tambah_merek') {
                include "module/merek/form_tambah.php";

            } elseif ($_GET['module'] == 'edit_merek') {
                include "module/merek/form_edit.php";

            } elseif ($_GET['module']=='member') {
            	include "module/member/list_member.php";
            } elseif($_GET['module']=='biaya'){
				include "module/biaya_kirim/list_biaya_kirim.php";
			} elseif($_GET['module']=='tambah_biaya'){
				include "module/biaya_kirim/form_tambah.php";
			} elseif($_GET['module']=='edit_biaya'){
				include "module/biaya_kirim/form_edit.php";
				}
    elseif ($_GET['module']=='pesanan') {
            	include "module/pesanan/list_pesanan.php";
				}
            else {
            	 include "module/home/home.php";
            }
			?>
			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Version</b> 2.3.0
				</div>
				<strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
			</footer>

			<!-- Control Sidebar -->
	
			<!-- Add the sidebar's background. This div must be placed
			immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>

		</div><!-- ./wrapper -->

		<!-- jQuery 2.1.4 -->
		<script src="asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<!-- Bootstrap 3.3.5 -->
		<script src="asset/bootstrap/js/bootstrap.min.js"></script>
		<!-- FastClick -->
		<script src="asset/plugins/fastclick/fastclick.min.js"></script>
		<!-- AdminLTE App -->
		<script src="asset/dist/js/app.min.js"></script>
		<!-- Sparkline -->
		<script src="asset/plugins/sparkline/jquery.sparkline.min.js"></script>
		<!-- jvectormap -->
		<script src="asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<!-- SlimScroll 1.3.0 -->
		<script src="asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- ChartJS 1.0.1 -->
		<script src="asset/plugins/chartjs/Chart.min.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="asset/dist/js/pages/dashboard2.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="asset/dist/js/demo.js"></script>
	</body>
</html>
<?php } ?>