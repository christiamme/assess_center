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
    $busqueda = $DB_connection -> prepare("SELECT max(aes_resultados.id), aes_resultados.estudiante, aes_resultados.evaluador, aes_actividades.titulo AS actividad, aes_dimensiones.titulo AS dimension, aes_resultados.nivel, aes_resultados.comentario FROM aes_resultados LEFT JOIN aes_actividades ON aes_resultados.plan_detalle_id = aes_actividades.id LEFT JOIN aes_dimensiones ON aes_dimensiones.id = aes_resultados.dimension_id WHERE aes_resultados.evaluador = :username GROUP BY aes_resultados.estudiante, aes_resultados.plan_detalle_id, aes_resultados.dimension_id");

    // Execute query
    $busqueda -> execute(
      array(
        'username' => $_SESSION['aes_username']
      )
    );

    // Unpack query content
    while ( $row = $busqueda -> fetch() ) {
      $data[] = array(
        'estudiante' => $row['estudiante'],
        'actividad' => $row['actividad'],
        'dimension' => $row['dimension'],
        'nivel' => $row['nivel']
      );
    }
}

?>
<html>
<head></head>
<body>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Estudiante</th>
              <th>Actividad</th>
              <th>Dimensión</th>
              <th>Nivel</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $envio) { ?>
            <tr>
              <td><?php echo $envio['estudiante']; ?></td>
              <td style="text-align:center;"><?php echo $envio['actividad']; ?></td>
              <td style="text-align:center;"><?php echo $envio['dimension']; ?></td>
              <td style="text-align:center;"><?php echo $envio['nivel']; ?></td>
            <tr>
            <?php } ?>
          <tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
