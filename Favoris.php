<?php
session_start();
$titre = "Liste des favoris";


include'header.inc.php';
include'nav_membre.php';


//$idjeu = $_SESSION['PROFILE']['id'];
require_once("database1.php");
require_once("role_membre.php");

?>

<div class="container text-center">
    <?php
    // Connexion à la base de données
    require_once("database1.php");
    $con = new mysqli($host, $login, $passwd, $dbname);
    if ($con->connect_error) {
        die('Erreur de connexion (' . $con->connect_errno . ') ' . $con->connect_error);
    } else {
        if (isset($_GET['id'])) {
            $idjeu = $_GET['id'];
        }
        $idmembre = $_SESSION['PROFILE']['id'];
        $sql = "SELECT images, nom, categorie  
                FROM jeu 
                INNER JOIN favoris ON jeu.id = favoris.id_jeu 
                WHERE membre = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $idmembre);
        $stmt->execute();
        $resultat =  $stmt->get_result();

        // Afficher les jeux s'il y en a
        echo '<h2>Liste des favoris</h2>';
        echo '<table class="table mx-auto" style="color: black;">';
        echo '<tr>
                <th>Images</th>
                <th>Nom</th>
                <th>Catégorie</th>
                </tr>';

        while ($row = $resultat->fetch_assoc()) {
            echo '<tr>';
            echo '<td><img src="../projetweb/images/' . $row['images'] . '" alt="Image du jeu" style="width:100px; height:100px;"></td>';
            echo '<td>' . $row['nom'] . '</td>';
            echo '<td>' . $row['categorie'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        

        // Aucun fetch_assoc nécessaire car il s'agit d'une opération INSERT
    }

    // Fermer la connexion à la base de données
    $con->close();
    ?>
</div>
