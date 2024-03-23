$(document).ready(function () {
  $("#registerForm").submit(function (event) {
    event.preventDefault();
    var username = $("#username").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var confirm = $("#confirm").val();
    if (password == confirm) {
      $.ajax({
        url: "./register.php", // Chemin vers votre script PHP
        type: "POST",
        data: {
          username: username,
          email: email,
          password: password,
        },
        success: function (data) {
          window.location.href = "./login.html";
          // alert(data);  Vous pouvez remplacer cela par une redirection ou une notification
        },
      });
    } else {
      alert("les deux mot de pass ne sont pas identique");
    }
  });
});
