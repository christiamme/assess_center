<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("../../resources/config_file.php");

$resultados = $_GET['resultados'];
$evento = $_GET['vt'];
$plan = $_GET['pl'];

if ( isset($_SESSION['aes_username']) ) {

    // Separate sets by student
    foreach ($resultados as $resultado) {
      // Handle empty comments
      $resultado[4] = $resultado[4]." ";

      // Save results
      $evaluaciones = $DB_connection -> prepare("INSERT INTO `aes_resultados` (`asignacion_id`, `estudiante`, `evaluador`, `plan_detalle_id`, `dimension_id`, `nivel`, `comentario`, `editar`) VALUES (:asignacion_id, :estudiante, :evaluador, :plan_detalle_id, :dimension_id, :nivel, :comentario, '1');");

      // Execute query
      $evaluaciones -> execute(
        array(
          'asignacion_id' => $resultado[5],
          'estudiante' => $resultado[0].'@itesm.mx',
          'evaluador' => $_SESSION['aes_username'],
          'plan_detalle_id' => $resultado[1],
          'dimension_id' => $resultado[2],
          'nivel' => $resultado[3],
          'comentario' => $resultado[4]
        )
      );

    }

    echo "Se guardaron los datos de la evaluación de la Actividad";

}
// else {
//     header("location:../login/login.php");
// }
