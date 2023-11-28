



<?php
session_start(); // Pour les messages
require_once("role_membre.php");
$nom = $_SESSION['PROFILE']['id'];
// Connexion à la base de données
require_once("database1.php");
$con = new mysqli($host, $login, $passwd, $dbname);

// Vérifier la connexion
if ($con->connect_error) {
    die('Erreur de connexion (' . $con->connect_errno . ') ' . $con->connect_error);
} else {
    // 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        if ($stmt_check = $con->prepare("SELECT * FROM creneaux WHERE  id=  ?")) {
          $stmt_check->bind_param("i" $id);
          $stmt_check->execute();
          $stmt_check->store_result();
          if ($stmt_check->num_rows > 0) {
              $_SESSION['message'] = "Vous avez déjà aimé ce jeu";
          } else {
              if ($stmt_insert = $mysqli->prepare("INSERT INTO souhaits(id_creneau, g_date, g_start, g_end, statut) VALUES ('" . $row['id'] . "', '" . $row['game_date'] . "', '" . $row['game_start'] . "','" . $row['game_end'] . "', 'en cours...')")) {
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
          $stmt_check->close();
      }

    }

    // Fermer la connexion à la base de données
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</body>

</html>



