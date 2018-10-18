<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("../../resources/config_file.php");

$titulo = "Evento Sin Título";
$descripcion_evento = "Evento sin descripción.";
$lugar = "Por determinar";
$horario = "Sin definir";

$id_evento = $_GET['evento'];
$id_evento = $_GET['plan'];

if ( isset($_SESSION['aes_username']) ) {

    $descripcion_evento = "Evento sin descripción para usuario ".$_SESSION['aes_username'];

    // Search in database

    // To protect MySQL injection, create parametrized query
    $busqueda = $DB_connection -> prepare("SELECT aes_assessment_evento.titulo, aes_assessment_evento.descripcion, aes_assessment_evento.lugar, aes_assessment_evento.inicio FROM `aes_assessment_evento` JOIN aes_assessment_asignacion ON aes_assessment_asignacion.evento_id=aes_assessment_evento.id WHERE aes_assessment_evento.id=:id_evento AND aes_assessment_asignacion.evaluador=:username GROUP BY aes_assessment_evento.id");

    // Execute query
    $busqueda -> execute(
      array(
        'username' => $_SESSION['aes_username'],
        'id_evento' => $id_evento
      )
    );

    // Unpack query content
    while ( $row = $busqueda -> fetch() ) {
        $titulo = $row['titulo'];
        $descripcion_evento = $row['descripcion'];
        $lugar = $row['lugar'];
        $horario = $row['inicio'];
    }
}

?>
<html>
<head></head>
<body>
  <h4><?php echo $titulo; ?></h4>
  <p><?php echo $descripcion_evento; ?></p>
  <ul>
    <li>Lugar: <?php echo $lugar; ?>.</li>
    <li>Horario: <?php echo $horario; ?>.</li>
  </ul>
</body>
</html>
