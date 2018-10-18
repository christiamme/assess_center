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
    $busqueda = $DB_connection -> prepare("SELECT aes_plan_detalle.plan_id, aes_dimensiones.titulo,aes_dimensiones.enunciado, aes_dimensiones.nivel_c, aes_dimensiones.nivel_b, aes_dimensiones.nivel_a, aes_dimensiones.nivel_0 FROM aes_plan_detalle JOIN aes_dimensiones ON aes_plan_detalle.dimension_id = aes_dimensiones.id WHERE aes_plan_detalle.plan_id = :id_plan GROUP BY aes_dimensiones.id");

    // Execute query
    $busqueda -> execute(
      array(
        'id_plan' => $id_plan
      )
    );

    // Unpack query content
    while ( $row = $busqueda -> fetch() ) {
      $dimensiones[] = array(
        'titulo' => $row['titulo'],
        'enunciado' => $row['enunciado'],
        'c' => $row['nivel_c'],
        'b' => $row['nivel_b'],
        'a' => $row['nivel_a'],
        'o' => $row['nivel_0']
      );
    }
} else {
    header("location:../login/login.php");
}

?>
<html>
<head></head>
<body>
  <?php foreach ($dimensiones as $dimension){ ?>
    <h4><?php echo $dimension['titulo']; ?></h4>
    <p><?php echo $dimension['enunciado']; ?></p>
    <table id="tabla_dimensiones" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nivel</th>
          <th>Descripción</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Excede</td>
          <td><?php echo $dimension['c']; ?></td>
        </tr>
        <tr>
          <td>Cumple</td>
          <td><?php echo $dimension['b']; ?></td>
        </tr>
        <tr>
          <td>Por debajo</td>
          <td><?php echo $dimension['a']; ?></td>
        </tr>
        <tr>
          <td>Incumple</td>
          <td><?php echo $dimension['o']; ?></td>
        </tr>
      </tbody>
    </table>
  <?php } ?>
</body>
</html>
