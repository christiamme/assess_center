<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("../../resources/config_file.php");

if (isset($_POST['usuario'])) {

    $_SESSION['aes_username'] = $_POST['usuario'];

    // Log the action to the logs list
    // To protect MySQL injection, create parametrized query
    $logs = $DB_connection -> prepare("INSERT INTO `aes_user_logs` (user, login) VALUES (:username, 1)");

    // Execute query
    $logs -> execute(
      array(
        'username' => $_SESSION['aes_username']
      )
    );

} else {
    echo "Usuario sin sesión iniciada";
}

?>
