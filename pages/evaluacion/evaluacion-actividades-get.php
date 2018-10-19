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

$colores = array('success', 'primary', 'danger');

if ( isset($_SESSION['aes_username']) ) {

    $descripcion_evento = "Evento sin descripción para usuario ".$_SESSION['aes_username'];

    // Search in database

    // Search for activities

    // To protect MySQL injection, create parametrized query
    $busqueda = $DB_connection -> prepare("SELECT aes_plan_detalle.*, aes_actividades.titulo, aes_actividades.descripcion FROM aes_plan_detalle LEFT JOIN aes_actividades ON aes_plan_detalle.actividad_id = aes_actividades.id WHERE aes_plan_detalle.plan_id = :id_plan GROUP BY aes_actividades.id");

    // Execute query
    $busqueda -> execute(
      array(
        'id_plan' => $id_plan
      )
    );

    // Unpack query content
    while ( $row = $busqueda -> fetch() ) {
      $actividades[] = array(
        'titulo' => $row['titulo'],
        'descripcion' => $row['descripcion'],
        'id_plan' => $row['plan_id'],
        'id_actividad' => $row['actividad_id']
      );
    }

    // Search for assigned students

    // To protect MySQL injection, create parametrized query
    $busqueda = $DB_connection -> prepare("SELECT aes_assessment_asignacion.id AS asignacion, aes_assessment_evento.inicio, CONCAT(aes_estudiantes.nombre, ' ', aes_estudiantes.paterno) AS evaluado, aes_estudiantes.correo AS correo, aes_assessment_evento.lugar, IF(aes_resultados.id IS NULL,'pendiente','iniciado') AS status, aes_assessment_asignacion.evaluador, aes_assessment_asignacion.evento_id, aes_assessment_asignacion.plan_id FROM `aes_assessment_asignacion` LEFT JOIN `aes_assessment_evento` ON aes_assessment_evento.id = aes_assessment_asignacion.evento_id LEFT JOIN aes_estudiantes ON aes_estudiantes.correo = aes_assessment_asignacion.estudiante LEFT JOIN aes_resultados ON aes_resultados.plan_detalle_id = aes_assessment_asignacion.plan_id WHERE aes_assessment_asignacion.evaluador = :username AND evento_id = :id_evento AND aes_assessment_asignacion.plan_id = :id_plan");

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
      $asignaciones[] = array(
        'id_asignacion' => $row['asignacion'],
        'nombre' => $row['evaluado'],
        'correo' => $row['correo'],
        'foto' => "../../vendors/theme/img/avatar2.png",
      );
    }

    // Search for dimensions

    // To protect MySQL injection, create parametrized query
    $busqueda = $DB_connection -> prepare("SELECT aes_plan_detalle.*, aes_dimensiones.titulo, aes_dimensiones.enunciado, aes_dimensiones.nivel_c, aes_dimensiones.nivel_b, aes_dimensiones.nivel_a, aes_dimensiones.nivel_0 FROM aes_plan_detalle LEFT JOIN aes_dimensiones ON aes_plan_detalle.dimension_id = aes_dimensiones.id WHERE aes_plan_detalle.plan_id = :id_plan");

    // Execute query
    $busqueda -> execute(
      array(
        'id_plan' => $id_plan
      )
    );

    // Unpack query content
    while ( $row = $busqueda -> fetch() ) {
      $dimensiones[] = array(
        'id_asignacion' => $row['id'],
        'id_actividad' => $row['actividad_id'],
        'id_dimension' => $row['dimension_id'],
        'titulo' => $row['titulo'],
        'descripcion' => $row['enunciado'],
        'leyenda_niveles' => array(
          'nivel0' => 'Incumple',
          'nivela' => 'Por debajo',
          'nivelb' => 'Cumple',
          'nivelc' => 'Excede'
        ),
        'descr_niveles' => array(
          'nivel0' => $row['nivel_0'],
          'nivela' => $row['nivel_a'],
          'nivelb' => $row['nivel_b'],
          'nivelc' => $row['nivel_c']
        )
      );
    }

    // index for activities
    $i = 0;
}

?>
<html>
<head></head>
<body>
  <?php foreach ($actividades as $actividad) {
    $i++;
  ?>
    <div class="box-group" id="accordion">
      <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
      <div class="panel box box-<?php echo $colores[$i%3]; ?> box-solid">
        <div class="box-header with-border">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>">
            <h4 class="box-title">
              <?php echo $i.'. '.$actividad['titulo']; ?>
            </h4>
            <div class="box-tools pull-right">
              Status:
              <button type="button" class="btn btn-box-tool"  id="cross<?php echo $i; ?>"><i class="fa fa-times"></i>
              <button type="button" class="btn btn-box-tool" style="display:none;" id="check<?php echo $i; ?>"><i class="fa fa-check"></i>
              </button>
            </div>
          </a>
        </div>
        <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse <?php echo ($i==1)?'in':''; ?>">
          <div class="box-body">
            <p><?php echo $actividad['descripcion'] ?></p>
            <hr style="border-top:5px solid #eee;" />
            <?php foreach ($dimensiones as $dimension) {
              if( $dimension['id_actividad'] != $actividad['id_actividad'] ) {
                continue;
              }
              else {
                $tick_labels[$i] = '[';
                foreach ($dimension['leyenda_niveles'] as $tick_label) {
                  $tick_labels[$i] .= "'".$tick_label."', ";
                }
                $tick_labels[$i] = substr($tick_labels[$i],0,-2);
                $tick_labels[$i] .= ']';
            ?>
            <label>
              <?php echo $dimension['titulo']; ?>:
            </label>
            <div style="margin-bottom:30px;">
              <?php echo $dimension['descripcion']; ?>
            </div>
            <?php
              foreach ($asignaciones as $estudiante) {
            ?>
            <div class="user-panel">
              <div class="pull-left image">
                <img src="<?php echo $estudiante['foto']; ?>" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info" style="color:black;">
                <label><?php echo $estudiante['nombre']; ?></label>
              </div>
            </div>
            <div class="col-md-9 text-center" style="margin-bottom:40px;">
                <?php
                  $input_tag[] = 'input_'.$dimension['id_actividad'].'-'.$dimension['id_dimension'].'_'.substr($estudiante['correo'],0,-9);
                ?>
                <input id="input_<?php echo $dimension['id_actividad'].'-'.$dimension['id_dimension'].'_'.substr($estudiante['correo'],0,-9); ?>" type="text" data-slider-ticks="[1, 2, 3, 4]" data-slider-ticks-labels="<?php echo $tick_labels[$i]; ?>" data-slider-ticks-snap-bounds="1" data-slider-value="1" data-slider-tooltip="hide" onchange="displayDim(this)"/>
            </div>
            <div class="col-md-12">
              <?php
                $tag = array('callout0', 'callouta', 'calloutb', 'calloutc');
                $niveles = array('nivel0', 'nivela', 'nivelb', 'nivelc');
                $i_n=0;
                foreach ($dimension['descr_niveles'] as $describe_nivel) {
              ?>
              <div class="callout callout-info" <?php echo ($i_n>0 ? 'style="display:none;"' : false); ?> id="<?php echo $tag[$i_n].'_'.$dimension['id_actividad'].'-'.$dimension['id_dimension'].'_'.substr($estudiante['correo'],0,-9); ?>">
                <p>
                  <?php echo $describe_nivel; ?>
                </p>
              </div>
              <?php
                  $i_n++;
                } ?>
            </div>
            <div style="margin-bottom:30px;">
              <label>Comentario a <?php echo $estudiante['nombre']; ?>:</label>
              <textarea class="form-control" rows="3" placeholder="Comentario de retroalimentación al estudiante" id="comentario_<?php echo $dimension['id_actividad'].'-'.$dimension['id_dimension'].'_'.substr($estudiante['correo'],0,-9); ?>"></textarea>
            </div>
          <?php } // foreach ($asignaciones as $estudiante) ends
            } // else $dimension['id_actividad'] ends ?>
            <hr style="border-top:5px solid #eee;" />
          <?php } // foreach ($dimensiones as $dimension) ends  ?>
          </div>
          <div class="box-footer text-center">
            <button class="btn btn-primary" id="siguiente" onclick="saveNext(<?php echo $i; ?>)"><i class="fa fa-save"></i> Guardar Actividad</button>
          </div>
          <!-- /.box-footer -->
        </div>
      </div>
    </div>
  <?php } // foreach ($actividades as $actividad) ends ?>
  </div>
  <script>
  <?php foreach ($input_tag as $value) {
    echo '$("#'.$value.'").slider({';
    echo '  ticks: [1, 2, 3, 4],';
    echo "  ticks_labels: ['Incumple', 'Por debajo', 'Cumple', 'Excede'],"; // POR REVISAR: Asignación correcta de etiquetas
    echo '  ticks_snap_bounds: 1';
    echo '});';
  } ?>
  </script>
</body>
</html>
