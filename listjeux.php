<?php
session_start();
$title_page = " Liste des Jeux";
include 'database1.php';
include'header.inc.php';
include'nav_membre.php';

require_once("role_membre.php");
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
            $result = $con->query("SELECT  id, images,  nom, categorie, regle FROM jeu ");

            if ($result) {
                // Afficher les jeux s'il y en a
                if ($result->num_rows > 0) {
                    echo '<h2>Liste des Jeux</h2>';
                    echo '<table class="table mx-auto" style="color: black;">';
                    echo '<tr>
                    <th>Images</th>
                    <th>Nom</th>
                    <th>Catégorie</th> <th>Règles</th>
                    <th>Sélection</th>
                    </tr>';

                    while ($row = $result->fetch_assoc()) {
                      echo '<tr>';
                        echo '<td><img src="../projetweb/images/' . $row['images'] . '" alt="Image du jeu" style="width:100px; height:100px;"></td>';
                        echo '<td>' . $row['nom'] . '</td>';
                        echo '<td>' . $row['categorie'] . '</td>';
                        echo '<td><a href="../projetweb/docpdf/' . $row['regle'] .'" download>Télécharger PDF</a></td>';
                        echo "<td><a href=' listcreneaux.php?id=" . $row['id'] . "'>Choisir un créneau</a></td>";       
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

        