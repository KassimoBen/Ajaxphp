<?php
// Connexion à la base de données
$host = "localhost";
$dbname = "login";
$username = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$dbname";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_SERVER["REQUEST_METHOD"])) {

        $username = $_POST['username'];
        echo $username;
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hachage du mot de passe

        $sql = "INSERT INTO users (`username`, `email`, `password`) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $email, $password]);

        echo "Enregistrement réussi!";
        echo $email;
    }
} catch(PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}

?>