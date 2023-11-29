<?php
session_start();
$titre = "Liste des créneaux";
include("header.inc.php");
//$idjeu = $_SESSION['PROFILE']['id'];
require_once("database1.php");
require_once("role_membre.php");
include 'nav_membre.php';
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
        

        $result = $con->query("SELECT images, nom, categorie  FROM favoris WHERE id = '$idjeu'");

        if ($result) {
            // Afficher les jeux s'il y en a
            echo '<h2>Liste des favoris</h2>';
            echo '<table class="table mx-auto" style="color: black;">';
            echo '<tr>
                    <th>Images</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Règles</th>
                    <th>Sélection</th>
                    </tr>';

                    while ($row = $result->fetch_assoc()) {
                      echo '<tr>';
                      echo '<td><img src="../projetweb/images/' . $row['images'] . '" alt="Image du jeu" style="width:100px; height:100px;"></td>';
                      echo '<td>' . $row['nom'] . '</td>';
                      echo '<td>' . $row['categorie'] . '</td>';
                      echo '<td><a href="../projetweb/docpdf/' . $row['regle'] . '" download>Télécharger PDF</a></td>';
                      echo "<td><a href='listcreneaux.php?id=" . $row['id'] . "'>Choisir un créneau</a></td>";
                      echo '</tr>';
                  }
                  echo '</table>';
            echo '<p>Jeu ajouté aux favoris avec succès.</p>';

        }  
            // Aucun fetch_assoc nécessaire car il s'agit d'une opération INSERT
            
        } else {
            echo "Erreur lors de l'ajout du jeu aux favoris : ' . $con->error";
        }
    }

    // Fermer la connexion à la base de données
    $con->close();
    ?>
</div>
