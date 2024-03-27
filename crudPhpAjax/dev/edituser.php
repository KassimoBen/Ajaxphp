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
        <h2>Edit user</h2>
        <form autocomplete="off" action="" method="post">
            <?php
        require 'config.php';
        $id=$_GET["id"];
        $rows = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user WHERE id = $id"));
        $tab=[];
        
        $tab=explode(",",$rows['chec']);
        
        ?>
            <input type="hidden" id="id" value="<?php echo $rows['id']; ?>">
            <label for="name">Nom</label>
            <input type="text" id="name" value="<?php echo  $rows['name'];?>"><br>
            <label for="name">Email</label>
            <input type="text" id="email" value="<?php echo $rows['email']; ?>"><br>
            <label for="">sex</label>
            <select name="" id="gender">
                <option value="Male" <?php if($rows['gender']== "Male") echo "selected"; ?>>Male</option>
                <option value="Femele" <?php if($rows['gender']== "Femele") echo "selected"; ?>>Femele</option>
            </select><br>
            <div>
                <label for="">filiere: </label><br>
                <input type="checkbox" class="info" value="INFO" <?php  for($inc=0; $inc < count($tab);$inc=$inc+1) {
                    if($tab[$inc]== "INFO") {
                        echo "checked";
                        }
            
                }; ?> /><label for="">INFO</label><br />
                <input type="checkbox" class="btp" value="BTP" <?php  for($inc=0; $inc < count($tab);$inc=$inc+1) {
                    if($tab[$inc]== "BTP") {
                        echo "checked";
                        }
            
                }; ?> /><label for="">BTP</label><br />
                <input type="checkbox" class="gm" value="GM" <?php  for($inc=0; $inc < count($tab);$inc=$inc+1) {
                    if($tab[$inc]== "GM") {
                        echo "checked";
                        }
            
                }; ?> /><label for="">GM</label><br />
                <input type="checkbox" class="env" value="ENV" <?php  for($inc=0; $inc < count($tab);$inc=$inc+1) {
                    if($tab[$inc]== "ENV") {
                        echo "checked";
                        }
            
                }; ?> /><label for="">ENV</label><br />
            </div>
            <br />
            <div id="niveau">
                <label for="">Niveau : </label><br>
                <input type="radio" class="homme" name="sexe" value="licence" <?php  if($rows['radio']== "licence") {
                        echo "checked"; };?> /><label for="">LICENCE</label><br />
                <input type="radio" class="femme" name="sexe" value="masters" <?php  if($rows['radio']== "masters") {
                        echo "checked";
                        };?> /><label for="">MASTERS</label><br />
            </div>
            <br />
            <button type="button" class="btn" onclick="submitData('edit');">edit</button>
        </form><br>
        <a href="index.php"> Enregistrement</a>
    </div>
    <?php require 'script.php'?>
</body>

</html>