<?php
session_start(); // Pour les messages
 
// Contenu du formulaire$id = htmlentities($_POST['Id']);
$jeu_photos = $_FILES['imageJeu']['name'];
$nom = htmlentities($_POST['nom']);
$categorie = htmlentities($_POST['categorie']);
$regle = $_FILES['pdfDocument']['name'];

 
$uploadImage = "../projetweb/images/".$jeu_photos;
$uploadPDF = "../projetweb/docpdf/".$regle;
 
move_uploaded_file($_FILES['imageJeu']['tmp_name'], $uploadImage);
move_uploaded_file($_FILES['pdfDocument']['tmp_name'], $uploadPDF);
 
// Connexion à la base de données
require_once("database1.php");
$con = new mysqli($host, $login, $passwd, $dbname);
if ($con->connect_error) {
    die('Erreur de connexion (' . $con->connect_errno . ') ' . $con->connect_error);
}
 
// Attention, ici on ne vérifie pas si l'utilisateur existe déjà
if ($stmt = $con->prepare("INSERT INTO jeu( images, nom, categorie, regle,) VALUES ( ?, ?, ?, ?)")) {
    // Correction : Pas besoin d'utiliser password_hash ici, car vous n'ajoutez pas un mot de passe
    $stmt->bind_param("ssss",  $nom, $categorie, $regle, $jeu_photos);
   
    // Le message est mis dans la session, il est préférable de séparer le message normal et le message d'erreur.
    if ($stmt->execute()) {
        $_SESSION['message'] = "Jeu ajouté avec succès";
       
    } else {
        $_SESSION['message'] =  "Échec d'ajout du jeu";
      
    }
    // Fermer le statement
    $stmt->close();
}
 
// Fermer la connexion à la base de données
$con->close();
 
// Redirection vers la page d'accueil
header('Location: espace_Admin.php');
?>