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
$id_plan = $_GET['plan'];

if ( isset($_SESSION['aes_username']) ) {

    $descripcion_evento = "Evento sin descripción para usuario ".$_SESSION['aes_username'];

    // Search in database

    // To protect MySQL injection, create parametrized query
    $busqueda = $DB_connection -> prepare("SELECT aes_assessment_evento.inicio, CONCAT(aes_estudiantes.nombre, ' ', aes_estudiantes.paterno) AS evaluado, aes_estudiantes.correo AS correo, aes_assessment_evento.lugar, IF(aes_resultados.id IS NULL,'pendiente','iniciado') AS status, aes_assessment_asignacion.evaluador, aes_assessment_asignacion.evento_id, aes_assessment_asignacion.plan_id FROM `aes_assessment_asignacion` LEFT JOIN `aes_assessment_evento` ON aes_assessment_evento.id = aes_assessment_asignacion.evento_id LEFT JOIN aes_estudiantes ON aes_estudiantes.correo = aes_assessment_asignacion.estudiante LEFT JOIN aes_resultados ON aes_resultados.plan_id = aes_assessment_asignacion.plan_id WHERE evaluador = :username AND evento_id = :id_evento AND aes_assessment_asignacion.plan_id = :id_plan");

    // Execute query
    $busqueda -> execute(
      array(
        'username' => $_SESSION['aes_username'],
        'id_evento' => $id_evento,
        'id_plan' => $id_plan
      )
    );

    // Unpack query content
    while ( $row = $busqueda -> fetch() ) {
      $data[] = array(
        'foto' => "../../vendors/theme/img/avatar2.png",
        'nombre' => $row['evaluado'],
        'correo' => $row['correo']
      );
    }
}

?>
<html>
<head></head>
<body>
  <?php foreach ($data as $estudiante) { ?>
    <div class="row">
      <div class="col-xs-4 col-sm-1 col-md-2">
        <img src="<?php echo $estudiante['foto'] ?>" alt="User Image" width="100%">
      </div>
      <div class="col-xs-8 col-sm-11 col-md-10">
        <p><strong><?php echo $estudiante['nombre'] ?></strong><br />
          <small><?php echo $estudiante['correo'] ?></small>
        </p>
      </div>
    </div>
  <?php } ?>
  </div>
</body>
</html>
