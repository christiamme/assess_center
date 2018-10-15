<?php

// Required and Includes
require_once('../../resources/pluginimporter.php');

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AES</title>
  <!-- Tell the browser to be responsive to screen width -->
  <?php
		$plugins = ['jquery',
					'bootstrap',
          'fontawesome',
          'ionicons',
          'icheck',
          'tema'];
		pluginimport('css', '../../', $plugins);
	?>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

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

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>AES</b></a> <small>Assessment Center</small>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="row" style="text-align:center;">
      <div class="col-xs-12">
        <img src="../../vendors/theme/img/avatar2.png" class="img-circle" alt="User Image" id="userimage" width="30%">
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <p class="login-box-msg" style="margin-top:10px;"><label id="username">Nombre</label>, elige tu perfil:</p>
      </div>
      <div class="col-xs-6">
        <button class="btn btn-primary" id="goStudent"><i class="fa fa-graduation-cap"></i>Estudiante</button>
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <button class="btn btn-success" id="goAssessor"><i class="fa fa-clipboard"></i> Evaluador</button>
      </div>
      <!-- /.col -->
    </div>
    <div class="row" style="text-align:center;">
      <div class="col-xs-12">
        <button class="btn btn-danger" id="signOut" style="margin-top:20px;"><i class="fa fa-power-off"></i> Cerrar Sesión</button>
      </div>
      <!-- /.col -->
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php
  pluginimport('js', '../../', $plugins);
?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  document.getElementById("goStudent").onclick = function () {
    location.href = "../estudiante/estudiante.php";
  };
  document.getElementById("goAssessor").onclick = function () {
    location.href = "../evaluador/evaluador.php";
  };
  document.getElementById("signOut").onclick = function () {
    firebase.auth().signOut().then(function() {
      $.post( variables.server.concat("pages/login/logout.php"), function( data ) {
        // Sign-out successful
        userinfo = {
          name: "Nombre",
          email: "Correo",
          photoUrl: "../../vendors/theme/img/avatar2.png",
          emailVerified: false,
          uid: 0
        }
        alert("Cerraste sesión");
      });
    }).catch(function(error) {
      // An error happened
      alert("Hubo un error al cerrar tu sesión, vuelve a intentar.");
    });
  };
</script>
</body>
</html>
