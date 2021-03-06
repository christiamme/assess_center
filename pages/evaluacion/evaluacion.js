$(document).ready(function () {

  // Load Assessment's Description
  $("#assess_box").boxRefresh({
    // The URL for the source.
    source: variables.server.concat("pages/evaluacion/evaluacion-assessment-get.php"),
    // GET query paramaters (example: {search_term: 'layout'}, which renders to URL/?search_term=layout).
    params: {evento: document.getElementById("id_evento").innerHTML, plan: document.getElementById("id_plan").innerHTML},
    // The CSS selector to the refresh button.
    trigger: '#assess_box_button',
    // The CSS selector to the target where the content should be rendered. This selector should exist within the box.
    content: '#assess_box_body',
    // Whether to automatically render the content.
    loadInContent: true,
    // Response type (example: 'json' or 'html')
    responseType: 'html',
    // The HTML template for the ajax spinner.
    overlayTemplate: '<div class="overlay"><div class="fa fa-refresh fa-spin"></div></div>',
    // Called before the ajax request is made.
    onLoadStart: function() {
      // Do something before sending the request.
    },
    // Called after the ajax request is made.
    onLoadDone: function(response) {
      // Do something after receiving a response.
    }
  });

  // Load Assessment's Dimensions
  $("#dims_box").boxRefresh({
    // The URL for the source.
    source: variables.server.concat("pages/evaluacion/evaluacion-dimensiones-get.php"),
    // GET query paramaters (example: {search_term: 'layout'}, which renders to URL/?search_term=layout).
    params: {evento: document.getElementById("id_evento").innerHTML, plan: document.getElementById("id_plan").innerHTML},
    // The CSS selector to the refresh button.
    trigger: '#dims_box_button',
    // The CSS selector to the target where the content should be rendered. This selector should exist within the box.
    content: '#dims_box_body',
    // Whether to automatically render the content.
    loadInContent: true,
    // Response type (example: 'json' or 'html')
    responseType: 'html',
    // The HTML template for the ajax spinner.
    overlayTemplate: '<div class="overlay"><div class="fa fa-refresh fa-spin"></div></div>',
    // Called before the ajax request is made.
    onLoadStart: function() {
      // Do something before sending the request.
    },
    // Called after the ajax request is made.
    onLoadDone: function(response) {
      // Do something after receiving a response.
    }
  });

  // Load Students
  $("#estudiantes").boxRefresh({
    // The URL for the source.
    source: variables.server.concat("pages/evaluacion/evaluacion-estudiantes-get.php"),
    // GET query paramaters (example: {search_term: 'layout'}, which renders to URL/?search_term=layout).
    params: {evento: document.getElementById("id_evento").innerHTML, plan: document.getElementById("id_plan").innerHTML},
    // The CSS selector to the refresh button.
    trigger: '#ests_box_button',
    // The CSS selector to the target where the content should be rendered. This selector should exist within the box.
    content: '#ests_box_body',
    // Whether to automatically render the content.
    loadInContent: true,
    // Response type (example: 'json' or 'html')
    responseType: 'html',
    // The HTML template for the ajax spinner.
    overlayTemplate: '<div class="overlay"><div class="fa fa-refresh fa-spin"></div></div>',
    // Called before the ajax request is made.
    onLoadStart: function() {
      // Do something before sending the request.
    },
    // Called after the ajax request is made.
    onLoadDone: function(response) {
      // Do something after receiving a response.
    }
  });

  // Load Activities
  $.get( variables.server.concat("pages/evaluacion/evaluacion-actividades-get.php"), {evento: document.getElementById("id_evento").innerHTML, plan: document.getElementById("id_plan").innerHTML}, function( data ) {
    $( "#acts" ).html( data );
  });
  // Use this after new boxes to be activated after loading
  // .load(content, function(){
  //   $('.box').activateBox();
  // });

  // Load Previously Sent Forms
  $("#envios_box").boxRefresh({
    // The URL for the source.
    source: variables.server.concat("pages/evaluacion/evaluacion-sent-get.php"),
    // GET query paramaters (example: {search_term: 'layout'}, which renders to URL/?search_term=layout).
    params: {evento: document.getElementById("id_evento").innerHTML, plan: document.getElementById("id_plan").innerHTML},
    // The CSS selector to the refresh button.
    trigger: '#envios_box_button',
    // The CSS selector to the target where the content should be rendered. This selector should exist within the box.
    content: '#envios_box_body',
    // Whether to automatically render the content.
    loadInContent: true,
    // Response type (example: 'json' or 'html')
    responseType: 'html',
    // The HTML template for the ajax spinner.
    overlayTemplate: '<div class="overlay"><div class="fa fa-refresh fa-spin"></div></div>',
    // Called before the ajax request is made.
    onLoadStart: function() {
      // Do something before sending the request.
    },
    // Called after the ajax request is made.
    onLoadDone: function(response) {
      // Do something after receiving a response.
    }
  });

});

// Save results and next step
function saveNext (step, act_id) {

  // Save results
  // {evento: document.getElementById("id_evento").innerHTML, plan: document.getElementById("id_plan").innerHTML}
  // var myStr = "input_1a-2d";
  // var subStr = myStr.match("-(.*)d");
  comments = document.getElementsByTagName('textarea');
  inputs = document.getElementsByTagName('input');
  res = [];

  for (i = 0; i < inputs.length; i++) {
    act = inputs[i].id;
    valor = inputs[i].value;
    comentario = comments[i].value;
    id_act = act.match("_(.*)-")[1];
    dim = act.match("-(.*)_")[1];
    asg = act.match("_(.*)a")[1].match("_(.*)")[1];
    student = act.match("a(.*)")[0];
    if (id_act == act_id) {
      res.push([student, id_act, dim, valor, comentario, asg]);
    }
  }
  formData = {
      vt: document.getElementById("id_evento").innerHTML,
      pl: document.getElementById("id_plan").innerHTML,
      resultados: res
  };

  // Alert user of saved results
  $.get( variables.server.concat("pages/evaluacion/evaluacion-set.php"), formData )
    .done( function( data ) {
      if(data=="Se guardaron los datos de la evaluación de la Actividad"){
        swal({
          title: "¡Actividad "+step+" guardada!",
          text: data,
          icon: "success",
          button: 'Continuar'
        });
        document.getElementById("check"+step).style.display = "";
        document.getElementById("cross"+step).style.display = "none";
        document.getElementById("collapse"+step).className = "panel-collapse collapse";
      }
      else {
        swal({
          title: "¡Error al guardar Actividad "+step+"!",
          text: "Fallo de comunicación: Intenta nuevamente en un minuto.",
          icon: "warning",
          button: 'Continuar'
        });
      }
  })
  .fail( function( data ) {
    swal({
      title: "¡Error al guardar Actividad "+step+"!",
      text: "Fallo de comunicación: Intenta nuevamente en un minuto.",
      icon: "warning",
      button: 'Continuar'
    });
  });

}

// Save results and next step
function displayDim (sliderInput) {
  var callout = sliderInput.id.substring(5);
  document.getElementById("callout0"+callout).style.display = "none";
  document.getElementById("callouta"+callout).style.display = "none";
  document.getElementById("calloutb"+callout).style.display = "none";
  document.getElementById("calloutc"+callout).style.display = "none";
  if (sliderInput.value == 4) {
    document.getElementById("calloutc"+callout).style.display = "";
  } else if (sliderInput.value == 3) {
    document.getElementById("calloutb"+callout).style.display = "";
  } else if (sliderInput.value == 2) {
    document.getElementById("callouta"+callout).style.display = "";
  } else {
    document.getElementById("callout0"+callout).style.display = "";
  }
}

// Logout
document.getElementById("signOut").onclick = function () {
  window.location.href = "../login/login.php";
};

// // Get info about input that was triggered
// $(document).ready(function(){
//         $("button").click(function(){
//             var myStr = "input_1a-2d";
//             var subStr = myStr.match("-(.*)d");
//             alert(subStr[1]);
//         });
//     });
