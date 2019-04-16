<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Start your development with a Dashboard for Bootstrap 4." name="description">
	<meta content="Spruko" name="author">

	<!-- Title -->
	<title>PRIX KDO - Administration</title>

	<!-- Favicon -->
	<link href="<?php echo base_url(); ?>assets/administration/img/brand/favicon.png" rel="icon" type="image/png">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">



	<!-- Icons -->
	<link href="<?php echo base_url(); ?>assets/administration/css/icons.css" rel="stylesheet">

	<!--Bootstrap.min css-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/administration/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Ansta CSS -->
	<link href="<?php echo base_url(); ?>assets/administration/css/dashboard.css" rel="stylesheet" type="text/css">

	<!-- Tabs CSS -->
	<link href="<?php echo base_url(); ?>assets/administration/plugins/tabs/style.css" rel="stylesheet" type="text/css">

	<!-- jvectormap CSS -->
    <link href="<?php echo base_url(); ?>assets/administration/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

	<!-- Custom scroll bar css-->
	<link href="<?php echo base_url(); ?>assets/administration/plugins/customscroll/jquery.mCustomScrollbar.css" rel="stylesheet" />

	<!-- Sidemenu Css -->
	<link href="<?php echo base_url(); ?>assets/administration/plugins/toggle-sidebar/css/sidemenu.css" rel="stylesheet">

	<!-- form Uploads -->
	<link href="<?php echo base_url(); ?>assets/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
	
	<!--Select2 css-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/administration/plugins/select2/select2.css">

</head>
<body class="app sidebar-mini rtl" >
	<div id="global-loader" ></div>
	<div class="page">
		<div class="page-main">
			<!-- Sidebar menu-->
			<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

			<?php include("templates/tpl_menu_gauche.php"); ?>

			<!-- Sidebar menu-->

			<!-- app-content-->
			<div class="app-content ">
				<div class="side-app">
					<div class="main-content">
						<div class="p-2 d-block d-sm-none navbar-sm-search">
							<!-- Form -->
							<form class="navbar-search navbar-search-dark form-inline ml-lg-auto">
								<div class="form-group mb-0">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-search"></i></span>
										</div><input class="form-control" placeholder="Rechercher" type="text">
									</div>
								</div>
							</form>
						</div>
						<!-- Top navbar -->

						<?php include("templates/tpl_menu_haut.php"); ?>
			
						<!-- Top navbar-->

						<!-- Page content -->
						<div class="container-fluid pt-8">




							<!--corps de la page debut -->
								<?php 
								   $this->load->view($pg_content); 
								?>
							<!--corps de la page fin-->






							<!-- Footer -->

							<?php include("templates/tpl_footer.php"); ?>

							<!-- Footer -->
						</div>
					</div>
				</div>
			</div>
			<!-- app-content-->
		</div>
	</div>
	<!-- Back to top -->
	<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

	<!-- Ansta Scripts -->
	<!-- Core -->
	<script src="<?php echo base_url(); ?>assets/administration/plugins/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/administration/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>assets/administration/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- Echarts JS -->
	<script src="<?php echo base_url(); ?>assets/administration/plugins/chart-echarts/echarts.js"></script>

	<!-- Fullside-menu Js-->
	<script src="<?php echo base_url(); ?>assets/administration/plugins/toggle-sidebar/js/sidemenu.js"></script>

	<!-- Custom scroll bar Js-->
	<script src="<?php echo base_url(); ?>assets/administration/plugins/customscroll/jquery.mCustomScrollbar.concat.min.js"></script>

	<!-- peitychart -->
	<script src="<?php echo base_url(); ?>assets/administration/plugins/peitychart/jquery.peity.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/administration/plugins/peitychart/peitychart.init.js"></script>

	<!-- Vector Plugin -->
	<script src="<?php echo base_url(); ?>assets/administration/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/administration/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?php echo base_url(); ?>assets/administration/plugins/jvectormap/gdp-data.js"></script>
	<script src="<?php echo base_url(); ?>assets/administration/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
	<script src="<?php echo base_url(); ?>assets/administration/plugins/jvectormap/jquery-jvectormap-uk-mill-en.js"></script>
	<script src="<?php echo base_url(); ?>assets/administration/plugins/jvectormap/jquery-jvectormap-au-mill.js"></script>
	<script src="<?php echo base_url(); ?>assets/administration/plugins/jvectormap/jquery-jvectormap-ca-lcc.js"></script>
	<script src="<?php echo base_url(); ?>assets/administration/js/dashboard2map.js"></script>

	<!-- Data tables -->
	<script src="?php echo base_url(); ?>assets/administration/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="?php echo base_url(); ?>assets/administration/plugins/datatable/dataTables.bootstrap4.min.js"></script>

	<!-- Ansta JS -->
	<script src="<?php echo base_url(); ?>assets/administration/js/custom.js"></script>
	<!--Select2 js-->
	<script src="<?php echo base_url(); ?>assets/administration/plugins/select2/select2.full.js"></script>

	<script src="<?php echo base_url(); ?>assets/administration/js/select2.js"></script>
	<script src="<?php echo base_url(); ?>assets/administration/js/dashboard-sales.js"></script>
	<script src="<?php echo base_url(); ?>assets/dropzone/dist/dropzone.js"></script>

	

	

</body>


</html>