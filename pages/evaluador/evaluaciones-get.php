<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("../../resources/config_file.php");

if ( isset($_SESSION['aes_username']) ) {

    // Search in database

    // To protect MySQL injection, create parametrized query
    $evaluaciones = $DB_connection -> prepare("SELECT aes_assessment_evento.inicio, CONCAT(aes_estudiantes.nombre, ' ', aes_estudiantes.paterno) AS evaluado, aes_estudiantes.correo, aes_assessment_evento.lugar, IF(aes_resultados.id IS NULL,'pendiente','iniciado') AS status, aes_assessment_asignacion.evaluador, aes_assessment_evento.titulo, aes_assessment_asignacion.evento_id FROM `aes_assessment_asignacion` LEFT JOIN `aes_assessment_evento` ON aes_assessment_evento.id = aes_assessment_asignacion.evento_id LEFT JOIN aes_estudiantes ON aes_estudiantes.correo = aes_assessment_asignacion.estudiante LEFT JOIN aes_resultados ON aes_resultados.plan_id = aes_assessment_asignacion.plan_id WHERE evaluador = :username ORDER BY aes_assessment_evento.inicio ASC");

    // Execute query
    $evaluaciones -> execute(
      array(
        'username' => $_SESSION['aes_username']
      )
    );

    // Unpack query content
    while ( $row = $evaluaciones -> fetch() ) {
        $data[] = array(
          'fechahora' => $row['inicio'],
          'estudiante' => $row['evaluado'],
          'email' => rawurlencode(base64_encode($row['correo'])),
          'sala' => $row['lugar'],
          'estado' => $row['status'],
          'evaluador' => $row['evaluador'],
          'evento' => $row['titulo'],
          'id_evento' => $row['evento_id']
        );
    }

    //build the JSON array for return
    $json = array(
            $data
        );
    echo json_encode($json, JSON_UNESCAPED_UNICODE);

} else {
    header("location:../login/login.php");
}

?>
