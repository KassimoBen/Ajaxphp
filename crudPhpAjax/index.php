<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuille</title>
    <link rel="icon" href="icone/logo.png" type="image/x-icon">
    <style>
    *,
    ::before,
    ::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #333;
        font-family: Arial, Helvetica, sans-serif;
        height: 100vh;
        background-image: url("icone/pexels-sebastian-voortman-165505.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        opacity: 75%;
        overflow-x: hidden;
    }

    .container-first {
        position: absolute;
        top: 30%;
        left: 5%;
    }

    h1 {
        text-transform: uppercase;
        font-size: 90px;
        color: #f1f1f1;
        font-family: abril fatface, sans-serif;
    }

    h1 span {
        position: relative;
    }

    .container-btns {
        position: relative;
        top: 550px;
    }

    .btns-first {
        border: 2px solid #f1f1f1;
        outline: none;
        background: transparent;
        font-size: 30px;
        padding: 10px;
        width: 200px;
        color: #f1f1f1;
        cursor: pointer;
        margin-left: 25px;
    }

    .container-btns:nth-child(1) {
        margin-right: 30px;
    }

    .btns-first:hover {
        transition: all 0.3s ease-in-out;
        background: #f1f1f1;
        color: #333;
    }

    .lignes {
        position: absolute;
        top: 6%;
        left: 5%;
    }

    .l1 {
        width: 250px;
        height: 3px;
        background: #f1f1f1;
        border-radius: 5px;
    }

    .l2 {
        width: 140px;
        height: 3px;
        background: #f1f1f1;
        border-radius: 5px;
        position: relative;
        top: 20px;
    }
    </style>
</head>

<body>
    <div class="lignes">
        <div class="l1"></div>
        <div class="l2"></div>
    </div>
    <div class="container-first">
        <h1><span>BIENVENUE </span><span>DANS </span><span>NOTRE SITE WEB </span></h1>
        <h6 style="color: #f1f1f1; font-size: 25px;">Site web pour l'exament de info3 aux ift</h6><br>
        <p style="color:black;" id="historique">



        </p>
    </div>
    <div class="container-btns">
        <a href="./login/login.html"><button class="btns-first b1">Connecter</button></a>
        <a href="./login/register.html"><button class="btns-first b2">Créer votre compte</button></a>
    </div>

</body>
<script src="js/gsap.min.js"></script>
<script src="js/app.js"></script>

</html>