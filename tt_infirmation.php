<?php
session_start();


require_once("database1.php");

require_once("roleAdmin.php");

if (isset($_GET['id'])) {
    $ide = $_GET['id'];
}
// Créer une connexion
$con = new mysqli($host, $login, $passwd, $dbname);

// Vérifier la connexion
if ($con->connect_error) {
    die("La connexion à la base de donnée
   
    s a échoué : " . $conn->connect_error);
} else {
    $states = "refusé";
    $sql = "UPDATE souhaits SET statut =  '$states' WHERE id_creneau = '$ide';";
    $stm = $con->query("SELECT * FROM souhaits WHERE id_creneau = '$ide'");
    $resultat = $stm->fetch_assoc();
    $cren = $resultat['id_creneau'];
    $uti = $resultat['id_membre'];

    $stm2 = $con->query("SELECT email FROM souhaits INNER JOIN utilisateurs ON (id_membre = id) WHERE id_creneau = '$id_creneau'");
    $resultat = $stm2->fetch_assoc();
    $emaill = $resultat['email'];


    $stm1 = $con->query("DELETE FROM souhaits WHERE id_membre = '$uti' AND id_creneau = '$cren';");

    
        header("Location:liste_souhaits.php");
    } else {
        echo "Erreur lors de l'ajout de l'image : " . mysqli_error($con);
    }
}

$con->close();
?>
