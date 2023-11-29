<?php
session_start();

require_once("roleAdmin.php");
require_once("nav_admin.php");

    $title_page = " Espace Administrateur";
    include("header.inc.php");
   
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
            $result = $con->query("SELECT    nom, prenom, email FROM utilisateurs WHERE statut=0 ");
         

            if ($result) {
                // Afficher les membres s'il y en a
                if ($result->num_rows > 0) {
                    echo '<h2>Liste des Membres</h2>';
                    echo '<table class="table mx-auto" style="color: black;">';
                    echo '<tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Mail</th> 
                    </tr>';

                    while ($row = $result->fetch_assoc()) {
                      echo '<tr>';
                        echo '<td>' . $row['nom'] . '</td>';
                        echo '<td>' . $row['prenom'] . '</td>';
                        echo '<td>' . $row['email'] .'</td>';          
                        echo '</tr>';
                    }

                    echo '</Membre>';
                } else {
                    echo '<p>Aucun membre</p>';
                }

                // Libérer le résultat
                $result->free();
            } else {
                echo 'Erreur lors de la récupération des membres : ' . $con->error;
            }

            // Fermer la connexion à la base de données
            $con->close();
            ?>
        </div>
    



