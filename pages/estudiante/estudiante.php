<?php

// Start
session_start();
$AppNombre = 'AES';

// Required and Includes
require_once('../../resources/pluginimporter.php');

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Estudiante</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<!-- Firebase App is always required and must be first -->
	<script src="https://www.gstatic.com/firebasejs/5.4.1/firebase-app.js"></script>

	<!-- Add additional services that you want to use -->
	<script src="https://www.gstatic.com/firebasejs/5.4.1/firebase-auth.js"></script>
	<!-- script src="https://www.gstatic.com/firebasejs/5.4.1/firebase-database.js"></script -->
	<!-- script src="https://www.gstatic.com/firebasejs/5.4.1/firebase-firestore.js"></script -->
	<!-- script src="https://www.gstatic.com/firebasejs/5.4.1/firebase-messaging.js"></script -->
	<!-- script src="https://www.gstatic.com/firebasejs/5.4.1/firebase-functions.js"></script -->
	<!-- <script src="https://www.gstatic.com/firebasejs/5.4.1/firebase-storage.js"></script> -->

  <!-- Check login or log user -->
  <script src="../../resources/js/variables.js" type="text/javascript"></script>
  <script src="../../resources/js/login.js"></script>

  <?php
		$plugins = ['jquery',
					'bootstrap',
					'datatables',
          'fontawesome',
          'ionicons',
          'tema'];
		pluginimport('css', '../../', $plugins);
	?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php
		include_once('../../resources/common/header.php');
		include_once('../../resources/common/menu.php');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Actualizar Cuenta
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Actualizar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
  				<div class="box box-info" id="photo_update">
            <div class="box-body" id="photo_box_body">

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once('../../resources/common/footer.php');
			  include_once('../../resources/common/sidebar.php');
  ?>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
	<?php
		pluginimport('js', '../../', $plugins);
	?>
	<script src="estudiante.js" type="text/javascript"></script>

</body>
</html>
