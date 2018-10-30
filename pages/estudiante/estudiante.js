$(document).ready(function () {

  UserPicture();

});

// Update User Picture
function UpdatePic() {
  $.get( variables.server.concat("pages/estudiante/update-photo.php"), {url: userinfo.photoUrl}, function( data ) {
    UserPicture();
  });
};

// Logout
document.getElementById("signOut").onclick = function () {
  window.location.href = "../login/login.php";
};

// Load Current User Picture from DB
function UserPicture() {
  // Load User Picture
  $("#photo_update").boxRefresh({
    // The URL for the source.
    source: variables.server.concat("pages/estudiante/estudiante-get.php"),
    // GET query paramaters (example: {search_term: 'layout'}, which renders to URL/?search_term=layout).
    // params: ,
    // The CSS selector to the refresh button.
    // trigger: ,
    // The CSS selector to the target where the content should be rendered. This selector should exist within the box.
    content: '#photo_box_body',
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
}
