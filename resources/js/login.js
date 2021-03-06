// Initialize Firebase
firebase.initializeApp(config);

firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.
    var user = firebase.auth().currentUser;
    // var name, email, photoUrl
    if (user != null) {
      userinfo = {
        name: user.displayName,
        email: user.email,
        photoUrl: user.photoURL
      }
    }
    // Start server session_start
    $.post( variables.server.concat("pages/login/log.php"), {usuario: userinfo.email}, function( data ) {
      // Load user image, name and email
      // Header (visible)
      document.getElementById("userimage").src = userinfo.photoUrl;
      document.getElementById("username").innerHTML = userinfo.name;
      // Header (dropdown)
      document.getElementById("avatar_header").src = userinfo.photoUrl;
      document.getElementById("nombre_header").innerHTML = userinfo.name+"<br /><small>"+userinfo.email+"</small>";
      // Sidebar
      document.getElementById("nombre_usuario").innerHTML = userinfo.name+"<br /><small>"+userinfo.email+"</small>";;
      document.getElementById("sideavatar").src = userinfo.photoUrl;
    });
  } else {
    // No user is signed in.
    // Authentication with redirect
    var provider = new firebase.auth.GoogleAuthProvider();
    provider.setCustomParameters({
      prompt: 'select_account',
      login_hint: '@itesm.mx'
    });
    firebase.auth().signInWithRedirect(provider);
  }
});
