



<?php
session_start();
$titre = "Liste des souhaits";
include("header.inc.php");
require_once("roleAdmin.php");
require_once("database1.php");
require_once("nav_admin.php");



// Création de la connexion
$con = new mysqli($host, $login, $passwd, $dbname);

// Vérification de la connexion
if ($con->connect_error) {
    die("La connexion à la base de données a échoué : " . $con->connect_error);
} else {
    $result = $con->query("SELECT * FROM souhaits INNER JOIN creneaux ON (id_creneau = id);");

    if ($result->num_rows > 0) {
        echo '<h2>Liste des Jeux</h2>';
        echo '<table class="table mx-auto" style="color: black;">';
        echo '<tr>
                <th>membres</th>
                <th>Images</th>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Date</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Statut</th>
                <th>confirmation</th>
                <th>Infirmation</th>
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
            echo '<td>' . $row['id_membre'] . '</td>';
            echo '<td><img src="' . $row2['images'] . '" style="width:100px; height:100px;"></td>';
            echo '<td>' . $row2['nom'] . '</td>';
            echo '<td>' . $row2['categorie'] . '</td>';
            echo '<td>' . $row['game_date'] . '</td>';
            echo '<td>' . $row['game_start'] . '</td>';
            echo '<td>' . $row['game_end'] . '</td>';
            echo '<td>' . $row['statut'] . '</td>';
            echo "<td><a href=' tt_confirmation.php?id=" . $row['id_creneau'] . "'>Accepter</a></td>";
            echo "<td><a href=' tt_infirmation.php?id=" . $row['id_creneau'] . "'>Refuser</a></td>";

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

