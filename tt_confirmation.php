<?php
session_start();

require_once("roleAdmin.php");


require_once("database1.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
// Créer une connexion
$con = new mysqli($host, $login, $passwd, $dbname);

// Vérifier la connexion
if ($con->connect_error) {
    die("La connexion à la base de donnée
   
    s a échoué : " . $con->connect_error);
} else {
$states = "confirmé";
$sql = "UPDATE souhaits SET statut =  '$states' WHERE id_creneau = '$id';";

if (mysqli_query($con, $sql)) {
    header("Location:espace_Admin.php");
} else {
    echo "Erreur lors de la modification : " . mysqli_error($con);
}
}

$con->close();
?>
