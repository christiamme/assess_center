// Initialize Firebase
var config = {
  apiKey: "APIKEY",
  authDomain: "DOMAIN",
  databaseURL: "URL",
  projectId: "PROJ_ID",
  storageBucket: "STORE",
  messagingSenderId: "SENDER_ID"
};
firebase.initializeApp(config);

firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.
    var user = firebase.auth().currentUser;
    // var name, email, photoUrl, uid, emailVerified;
    if (user != null) {
      userinfo = {
        name: user.displayName,
        email: user.email,
        photoUrl: user.photoURL,
        emailVerified: user.emailVerified,
        uid: user.uid  // The user's ID, unique to the Firebase project. Do NOT use
                         // this value to authenticate with your backend server, if
                         // you have one. Use User.getToken() instead.
      }
    }
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
  } else {
    // No user is signed in.
    // Authentication with redirect
    var provider = new firebase.auth.GoogleAuthProvider();
    provider.setCustomParameters({
      prompt: 'select_account'
    });
    firebase.auth().signInWithRedirect(provider);
  }
});
