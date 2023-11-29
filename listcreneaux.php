
<?php
session_start();
$idjeu = $_SESSION['PROFILE']['id'];
$titre = "Liste des créneaux";
include("header.inc.php");

require_once("database1.php");
require_once("role_membre.php");
include'nav_membre.php';
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
        
            //$result1 = $con->query("INSERT INTO souhaits (id_Jeu, nom, categories) VALUES ('$idjeu', '$name', '$idc')");
            // Requête SELECT pour récupérer les jeux
            $result = $con->query("SELECT id, game_date, game_start, game_end FROM creneaux WHERE jeu = '$idjeu'");
            if ($result) {
                // Afficher les jeux s'il y en a
                if ($result->num_rows > 0) {
                    echo '<h2>Liste des créneaux</h2>';
                    echo '<table class="table mx-auto" style="color: black;">';
                    echo '<tr>
                            <th>Date</th>
                            <th>Heure de Début</th> 

                            <th>Heure de fin</th>
                            <th>Sélection</th>
                          </tr>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['game_date'] . '</td>';
                        echo '<td>' . $row['game_start'] . '</td>';
                        echo '<td>' . $row['game_end'] . '</td>';
                        echo "<td><a href=' tt_creneaux.php?id=" . $row['id'] . "'>confirmer</a></td>";
                        echo '</tr>';
                    }

                    echo '</table>';
                } else {
                    echo '<p>Aucun créneau disponible pour le moment.</p>';
                }

                // Libérer le résultat
                $result->free();
            } else {
                echo 'Erreur lors de la récupération des jeux : ' . $con->error;
            }

        }
    

    
    // Fermer la connexion à la base de données
    $con->close();
    ?>
</div>
