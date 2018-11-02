<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once("../../resources/config_file.php");

if ( isset($_SESSION['aes_username']) ) {

    // Separate sets by student


    foreach ($student as $key => $value) {
      // Search for aes_assessment_asignacion.id that matches estudiante, evento_id, plan_id, evaluador
      $evaluaciones = $DB_connection -> prepare("SELECT `aes_assessment_asignacion.id` FROM `aes_assessment_asignacion` WHERE `aes_assessment_asignacion.estudiante` = :estudiante AND `aes_assessment_asignacion.evento_id` = :evento_id AND `aes_assessment_asignacion.plan_id` = :plan_id AND `aes_assessment_asignacion.evaluador` = :evaluador;");

      // Execute query
      $evaluaciones -> execute(
        array(
          'estudiante' => ,
          'evaluador' => $_SESSION['aes_username'],
          'plan_id' => ,
          'evento_id' =>
        )
      );

      // Unpack query content
      while ( $row = $evaluaciones -> fetch() ) {
        $id_asignacion = $row['id'];
      }

      foreach ($dimension as $key => $value) {
        // Save results
        $evaluaciones = $DB_connection -> prepare("INSERT INTO `aes_resultados` (`asignacion_id`, `estudiante`, `evaluador`, `plan_detalle_id`, `dimension_id`, `nivel`, `comentario`, `editar`) VALUES (:asignacion_id, :estudiante, :evaluador, :plan_detalle_id, :dimension_id, :nivel, :comentario, '1');");

        // Execute query
        $evaluaciones -> execute(
          array(
            'asignacion_id' => $id_asignacion,
            'estudiante' => ,
            'evaluador' => $_SESSION['aes_username'],
            'plan_detalle_id' => ,
            'dimension_id' => ,
            'nivel' => ,
            'comentario' =>
          )
      }
    }
  );



    // To protect MySQL injection, create parametrized query
    $evaluaciones = $DB_connection -> prepare("INSERT INTO `aes_resultados` (`asignacion_id`, `estudiante`, `evaluador`, `plan_detalle_id`, `dimension_id`, `nivel`, `comentario`, `editar`) VALUES (:asignacion_id, :estudiante, :evaluador, :plan_detalle_id, :dimension_id, :nivel, :comentario, '1');");

    // Execute query
    $evaluaciones -> execute(
      array(
        'asignacion_id' => ,
        'estudiante' => ,
        'evaluador' => $_SESSION['aes_username'],
        'plan_detalle_id' => ,
        'dimension_id' => ,
        'nivel' => ,
        'comentario' =>
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
