<?php
session_start();

require_once("roleAdmin.php");
?>
<?php

// Contenu du formulaire
$jeu = $_SESSION['id'];
$gameDate = htmlentities($_POST['game_date']);
$start = htmlentities($_POST['start']);
$end = htmlentities($_POST['end']);

// Connexion à la base de données
require_once("database1.php");
$con = new mysqli($host, $login, $passwd, $dbname);
if ($con->connect_error) {
    die('Erreur de connexion (' . $con->connect_errno . ') ' . $con->connect_error);
}
else{
 // Attention, ici on ne vérifie pas si l'utilisateur existe déjà
$stmt = $con->query("INSERT INTO creneaux (jeu, game_date, game_start, game_end) VALUES ('$jeu', '$gameDate', '$start','$end' );");
// Correction : Utilisation des types appropriés dans bind_pa

// Exécute la requête
if ($stmt) {
  

    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">';
    echo '<script src="../js/bootstrap.min.js"></script>';
    echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <strong class="me-auto">Notification</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
                Insertion réussie!
              </div>
            </div>';
    echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>';
    echo "<script>
            // Affiche le toast de bienvenue après 1 seconde
            setTimeout(function () {
                var bienvenueToast = new bootstrap.Toast(document.getElementById('bienvenue-toast'));
                bienvenueToast.show();
            }, 200);
            
            setTimeout(function () {
                window.location.href = 'espace_Admin.php';
            }, 4000);
          </script>";
        } else {
          echo "Erreur SQL : " . $con->error;
        }

// Fermer le statement


}


// Fermer la connexion à la base de données
$con->close();

function showErrorToast($message) {
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">';
    echo '<script src="../js/bootstrap.min.js"></script>';
    echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="toast-header">
                    <strong class="me-auto">Notification</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                  <div class="toast-body">
                    ' . $message . '
                  </div>
                </div>';
    echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>';
    echo "<script>
            // Affiche le toast de bienvenue après 1 seconde
            setTimeout(function () {
                var bienvenueToast = new bootstrap.Toast(document.getElementById('bienvenue-toast'));
                bienvenueToast.show();
            }, 200);
            
            setTimeout(function () {
                window.location.href = 'espace_Admin.php';
            }, 4000);
          </script>";
}
?>
