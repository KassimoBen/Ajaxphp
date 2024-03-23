$(document).ready(function () {
  $("#loginForm").submit(function (event) {
    event.preventDefault();
    var email = $("#loginEmail").val();
    var password = $("#loginPassword").val();
    $.ajax({
      url: "login.php", // Chemin vers votre script PHP
      type: "POST",
      data: {
        email: email,
        password: password,
      },
      success: function (data) {
        if (data == "Identifiants corrects") {
          window.location.href = "../dev/index.php";
        } else {
          email = "";
          password = "";
        }
      },
      error: function (xhr, status, error) {
        console.log("erreur:" + error);
      },
    });
  });
});
