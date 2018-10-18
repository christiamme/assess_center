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

});

// Logout
document.getElementById("signOut").onclick = function () {
  window.location.href = "../login/login.php";
};
