

<?php
session_start();

require_once("roleAdmin.php");


$title = " Liste des Créneaux";
include 'database1.php';
include'header.inc.php';
require_once("nav_admin.php");

?>




    
        <div class="container text-center">
            <?php
            // Connexion à la base de données
            require_once("database1.php");
            $con = new mysqli($host, $login, $passwd, $dbname);
            if ($con->connect_error) {
                die('Erreur de connexion (' . $con->connect_errno . ') ' . $con->connect_error);
            }

            // Requête SELECT pour récupérer les jeux
            $result = $con->query("SELECT * FROM creneaux;");

            if ($result) {
                // Afficher les jeux s'il y en a
                if ($result->num_rows > 0) {
                    echo '<h2>Liste des Créneaux</h2>';
                    echo '<table class="table mx-auto" style="color: black;">';
                    echo '<tr>
                    <th>Jeu</th>
                    <th>Date</th>
                    <th>Début</th> 
                    <th>Fin</th>
                    <th>Suppression</th>
                    <th>Modification</th>
                    </tr>';

                    while ($row = $result->fetch_assoc()) {
                      echo '<tr>';
                        echo '<td>' . $row['jeu'] . '</td>';
                        echo '<td>' . $row['game_date'] . '</td>';
                        echo '<td>' . $row['game_start'] . '</td>';
                        echo '<td>' . $row['game_end'] .'</td>';
                        echo "<td><a href=' tt_delete_creneau.php?id=" . $row['id'] . "'>Supprimer</a></td>";
                        echo "<td><a href=' Mod_creneau.php?id=" . $row['id'] . "'>Modifier</a></td>";        
                        echo '</tr>';
                    }

                    echo '</table>';
                } else {
                    echo '<p>Aucun jeu disponible pour le moment.</p>';
                }

                // Libérer le résultat
                $result->free();
            } else {
                echo 'Erreur lors de la récupération des jeux : ' . $con->error;
            }

            // Fermer la connexion à la base de données
            $con->close();
            ?>
        </div>
    
