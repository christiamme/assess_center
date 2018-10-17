$(document).ready(function () {

  // Create DataTable object
  var tabla = $('#tabla_assessments').DataTable({
      "responsive": true,
      "columnDefs": [
              { responsivePriority: 1, targets: 0 },
              { responsivePriority: 1, targets: 2 },
              { responsivePriority: 1, targets: 3 }
          ]
      }
  );

  // Get content for the table
  $.getJSON(variables.server.concat("pages/evaluador/evaluaciones-get.php"),
  function (json) {
    /* / Clear "No data" message
    $("#tabla_clientes").find('tbody').empty(); */
    // Build table
    for (var i = 0; i < json[0].length; i++) {
      // nombre = '<a href="../cliente/cliente.php?id=' + json[0][i].id + '">' + json[0][i].nomcomercial + '</a>';
      eval_url = '../evaluacion/evaluacion.php?evento=' + json[0][i].id_evento + '&plan=' + json[0][i].id_plan;
      horario = '<a href="' + eval_url + '">' + json[0][i].fechahora + '</a>';
      alumno = '<a href="' + eval_url + '">' + json[0][i].estudiante.replace(',', ', ') + '</a>';

      tabla.row.add([
        horario,
        alumno,
        json[0][i].sala,
        json[0][i].estado
      ]).draw();

    }
  });

});

// Logout
document.getElementById("signOut").onclick = function () {
  window.location.href = "../login/login.php";
};
