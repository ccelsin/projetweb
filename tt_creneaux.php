<?php
session_start(); // Pour les messages
require_once("role_membre.php");
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
        
        $stmt_check = $con->prepare("SELECT * FROM creneaux WHERE id = ?");
        $stmt_check->bind_param("i", $id);  // Lier le paramètre à la requête
        $stmt_check->execute();
        $stmt_check->store_result();

        // Utiliser bind_result pour récupérer les résultats
        $stmt_check->bind_result($id, $jeu, $game_date, $game_start, $game_end);  // Assurez-vous de lister toutes les colonnes nécessaires

        if ($stmt_check->num_rows > 0) {
            // Continuez avec le reste de votre code ici
            if ($stmt_check->num_rows > 0) {
              // Continuez avec le reste de votre code ici
              while ($stmt_check->fetch()) {
                  // Préparez la requête d'insertion des souhaits
                  $stmt_insert = $con->prepare("INSERT INTO souhaits(id_Jeu, id_creneau, g_date, g_start, g_end, statut) VALUES (?,?, ?, ?, ?, 'en cours...')");
          
                  // Vérifiez si la préparation de la requête a échoué
                  if (!$stmt_insert) {
                      echo 'Erreur de préparation de la requête d\'insertion : ' . $con->error;
                  } else {
                      // Lier les paramètres
                      $stmt_insert->bind_param("iisss", $jeu, $id, $game_date, $game_start, $game_end);
          
                      // Exécuter la requête d'insertion
                      if ($stmt_insert->execute()) {
                          echo 'créneau choisi';
                      } else {
                          // Afficher les détails de l'erreur d'exécution
                          echo 'Erreur lors de l\'exécution de la requête d\'insertion : ' . $stmt_insert->error;
                      }
          
                      // Fermer la requête d'insertion
                      $stmt_insert->close();
                  }
              }
          } else {
              echo 'erreur lors du choix';
          }
          
        } else {
            echo 'erreur lors du choix';
        }

        $stmt_check->close();
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
