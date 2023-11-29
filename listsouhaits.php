<?php
session_start();
$titre_page = "Liste des souhaits";
include("header.inc.php");
require_once("role_membre.php");
require_once("database1.php");

$membre = $_SESSION['PROFILE']['id'];

// Création de la connexion
$con = new mysqli($host, $login, $passwd, $dbname);

// Vérification de la connexion
if ($con->connect_error) {
    die("La connexion à la base de données a échoué : " . $con->connect_error);
} else {
    $result = $con->query("SELECT * FROM souhaits INNER JOIN creneaux ON (id_creneau = id);");
    

    if ($result->num_rows > 0) {
        echo '<h2>Liste des Souhaits</h2>';
        echo '<table class="table mx-auto" style="color: black;">';
        echo '<tr>
                <th>Images</th>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Date</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Statut</th>
                
                </tr>';

        while ($row = $result->fetch_assoc()) {

            $id_Jeu = $row['jeu'];
            $sql = "SELECT images, nom, categorie FROM jeu  WHERE id = ?;";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $id_Jeu); // "i" indique que $id_Jeu est un entier
            $stmt->execute();
            $result2 = $stmt->get_result();
            if ($row2 = $result2->fetch_assoc()) {
            echo '<tr>';
            echo '<td><img src="' . $row2['images'] . '" style="width:100px; height:100px;"></td>';
            echo '<td>' . $row2['nom'] . '</td>';
            echo '<td>' . $row2['categorie'] . '</td>';
            echo '<td>' . $row['game_date'] . '</td>';
            echo '<td>' . $row['game_start'] . '</td>';
            echo '<td>' . $row['game_end'] . '</td>';
            echo '<td>' . $row['statut'] . '</td>';

            echo '</tr>';
            }
            
        }

        echo '</table>';
    } else {
        echo '<p>Aucun jeu dans la liste de souhaits.</p>';
    }
}

// Fermeture de la connexion à la base de données
$con->close();
?>
