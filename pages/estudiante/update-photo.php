<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("../../resources/config_file.php");

if ( isset($_SESSION['aes_username']) ) {

    // Default image
    $img_path = "../../vendors/theme/img/avatar2.png";

    // Search in database

    // To protect MySQL injection, create parametrized query
    $users = $DB_connection -> prepare("INSERT INTO aes_user_images (user, img_url) VALUES (:username, :img_url)");

    // Execute query
    $users -> execute(
      array(
        'username' => $_SESSION['aes_username'],
        'img_url' => $_GET['url']
      )
    );

} else {
    header("location:../login/login.php");
}

?>
<html>
<head></head>
<body>
  <label>Foto actual:</label><br />
  <p style="text-align:center;"><img src="<?php echo $img_path; ?>" id="foto"></p>
  <label>Actualizar con la foto de mi cuenta de Google: </label><br />
  <p style="text-align:center;"><button class="btn btn-danger" id="upPic"><i class="fa fa-image"></i>Actualizar Ahora</button></p>
</body>
</html>
