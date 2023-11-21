
<?php
$options = [
    'cost' =>12,
];
session_start(); // Démarrer la session pour les messages
 
$email = htmlentities($_POST['email']);
$password = htmlentities($_POST['password']);
 
// Connexion à la base de données
require_once("database1.php");
$con = new mysqli($host, $login, $passwd, $dbname);
 
if ($con->connect_error) {
    die('Erreur de connexion (' . $con->connect_errno . ') ' . $con->connect_error);
}
 
// Préparation de la requête SQL
if ($stmt = $con->prepare("SELECT * FROM utilisateurs WHERE email=? AND mdp=? LIMIT 1")) {
    $stmt->bind_param("ss", $email,$password);
    $stmt->execute();
 
    // Vérifier s'il y a des erreurs dans la requête
    if ($stmt->error) {
        die('Erreur de requête : ' . $stmt->error);
    }
 
    $result = $stmt->get_result();
 
    // Vérifier s'il y a des résultats
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
 
        // Vérifier le mot de passe avec password_verify
        $password = password_hash($password, PASSWORD_BCRYPT, $options);
            // Stocker les informations de l'utilisateur dans la session
            $_SESSION['PROFILE'] = $row;
 
            // Redirection en fonction du rôle
            if ($row["statut"] == 1) {
                $_SESSION['message'] = "Authentification réussie pour un admin.";
                header('Location: espace_Admin.php');
            } elseif ($row["statut"] == 0) {
                $_SESSION['message'] = "Authentification réussie pour un utilisateur.";
                header('Location: espace_perso.php');
            }
        } else {
            // Redirection si le mot de passe est incorrect
            $_SESSION['message'] = "Mot de passe ou email incorrect.";
            header('Location: connexion.php');
        }
    } else {
        // Redirection si l'utilisateur n'existe pas
        $_SESSION['message'] = "Identifiant inexistant.";
        header('Location: index.php');
    }
 
    // Fermer le statement
    $stmt->close();{
 
   
////else {
    // Gérer l'erreur si la préparation de la requête échoue
    //die('Erreur de préparation de la requête : ' . $mysqli->error);
}
 
// Fermer la connexion à la base de données
$con->close();
?>
