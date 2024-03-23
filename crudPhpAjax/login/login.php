<?php
// Connexion à la base de données
$host = "localhost";
$dbname = "login";
$username = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$dbname";

session_start();

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Connexion réussie
            $_SESSION['user_id'] = $user['id'];
            // header("location:../dev/index.php");
            echo "Identifiants corrects";
        } else {
            // Échec de la connexion
            echo "Identifiants incorrects";
        }
    }
} catch(PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
?>