<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/style.css">
    <title>adduser</title>
</head>

<body>
    <div id="form">
        <h2>UTILISATEUR</h2>
        <form autocomplete="off" action="" method="post">
            <label for="name">Nom</label>
            <input type="text" id="name" value=""><br>
            <label for="name">Prenom</label>
            <input type="text" id="email" value=""><br>
            <label for="">Sexe</label>
            <select name="" id="gender">
                <option value="Male">Male</option>
                <option value="Femele">Femele</option>
            </select><br>

            <div>
                <label for="">filiere: </label><br>
                <input type="checkbox" class="info" value="INFO" /><label for="">INFO</label><br />
                <input type="checkbox" class="btp" value="BTP" /><label for="">BTP</label><br />
                <input type="checkbox" class="gm" value="GM" /><label for="">GM</label><br />
                <input type="checkbox" class="env" value="ENV" /><label for="">ENV</label><br />
            </div>
            <br />
            <div id="niveau">
                <label for="">Niveau : </label><br>
                <input type="radio" class="homme" name="sexe" value="licence" /><label for="">LICENCE</label><br />
                <input type="radio" class="femme" name="sexe" value="masters" /><label for="">MASTERS</label><br />
            </div>
            <br />

            <button type="button" class="btn" onclick="submitData('insert');">Inserer</button>
        </form><br>
        <button><a href="index.php"> Enregistrement</a></button>
    </div>
    <?php require 'script.php'?>
</body>

</html>