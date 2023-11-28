
<?php
session_start();
$idjeu = $_SESSION['PROFILE']['id'];
$titre = "Liste des créneaux";
include("header.inc.php");

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
        
                if ($stmt_check = $con->prepare("SELECT nom, categorie FROM jeu WHERE  id=  ?")) {
                  $stmt_check->bind_param("i" $idjeu);
                  $stmt_check->execute();
                  $stmt_check->store_result();
                  if ($stmt_check->num_rows > 0) {
                      $_SESSION['message'] = "Vous avez déjà aimé ce jeu";
                  } else {
                      if ($stmt_insert = $con->prepare("INSERT INTO souhaits(id_Jeu, nom, categorie) VALUES ('" . $row['id'] . "', '" . $row['nom'] . "', '" . $row['categorie'] . "')")) {
                          if ($stmt_insert->execute()) {
                            echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
                            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
                       
                       
                          <script src="../js/bootstrap.min.js"></script>';
                       
                            echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                              <strong class="me-auto">Notification</strong>
                              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                              Génial!! Le créneau a été choisi avec succès!
                            </div>
                          </div>';
                       
                            echo ' <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>';
                       
                       
                            echo "<script>
                            // Affiche le toast de bienvenue après 1 seconde
                       
                            setTimeout(function () {
                              var bienvenueToast = new bootstrap.Toast(document.getElementById('bienvenue-toast'));
                              bienvenueToast.show();
                              toast.hide();
                       
                            }, 200);
                         
                            setTimeout(function () {
                                window.location.href = 'espace_perso.php';
                              }, 4000);
                          </script>";
                          } else {
                            echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
                            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
                       
                       
                          <script src="../js/bootstrap.min.js"></script>';
                       
                            echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                              <strong class="me-auto">Notification</strong>
                              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                              erreur lors de la suppression!
                            </div>
                          </div>';
                       
                            echo ' <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>';
                       
                       
                            echo "<script>
                            // Affiche le toast de bienvenue après 1 seconde
                       
                            setTimeout(function () {
                              var bienvenueToast = new bootstrap.Toast(document.getElementById('bienvenue-toast'));
                              bienvenueToast.show();
                              toast.hide();
                       
                            }, 200);
                         
                            setTimeout(function () {
                                window.location.href = 'espace_perso.php';
                              }, 4000);
                          </script>";
                          }
                      }
                  }
                  





            
            //$result1 = $con->query("INSERT INTO souhaits (id_Jeu, nom, categories) VALUES ('$idjeu', '$name', '$idc')");
            // Requête SELECT pour récupérer les jeux
            $result = $con->query("SELECT id, game_date, game_start, game_end FROM creneaux WHERE jeu = '$idjeu'");
            if ($result) {
                // Afficher les jeux s'il y en a
                if ($result->num_rows > 0) {
                    echo '<h2>Liste des Jeux</h2>';
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
       

    }
    // Fermer la connexion à la base de données
    $con->close();
    ?>
</div>
