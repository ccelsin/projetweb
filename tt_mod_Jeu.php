<?php
session_start();
$id = $_SESSION['id'];
$nouveauNom = $_POST['name'];
$nouvelleCategorie = $_POST['nouvelleCategorie'];
$regle = $_FILES['pdfDocument']['name'];
$jeu_photos = $_FILES['imageJeu']['name'];
require_once("database1.php");
//créer la connexion
$con = new mysqli($host, $login, $passwd, $dbname);
//vérifier la connexion
if ($con->connect_error) {
  die("La connexion à la base de données a échoué : " . $con->connect_error);
}else{
  $sql = "UPDATE jeu SET images= '$jeu_photos' , nom= '$nouveauNom', categorie= '$nouvelleCategorie', regle= '$regle' WHERE id= '$id'";
  if (mysqli_query($con, $sql)) {
    header("Location:espace_Admin.php");
} else {
    echo "Erreur lors de l'ajout de l'image : " . mysqli_error($conn);
}
}

$con->close();
?>




