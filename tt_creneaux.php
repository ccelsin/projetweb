<?php
session_start(); // Pour les messages
require_once("role_membre.php");
// Connexion à la base de données
require_once("nav_membre.php");
require_once("database1.php");
$con = new mysqli($host, $login, $passwd, $dbname);

// Vérifier la connexion
if ($con->connect_error) {
    die('Erreur de connexion (' . $con->connect_errno . ') ' . $con->connect_error);
} else {
    // 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $membre= $_SESSION['PROFILE']['id'];
       

       

      
              // Continuez avec le reste de votre code ici
              
               
   
                
                  // Préparez la requête d'insertion des souhaits
                  $stmt_insert = $con->prepare("INSERT INTO souhaits (id_membre, id_creneau, statut) VALUES (?,?,'en cours...')");
          
                
                      // Lier les paramètres
                      $stmt_insert->bind_param("ii",  $membre,$id);
          
                      // Exécuter la requête d'insertion
                      if ($stmt_insert->execute()) {
                          echo 'créneau choisi';
                      } else {
                          // Afficher les détails de l'erreur d'exécution
                          echo 'Vous avez déja choisi ce créneau' ;
                      }
          
                      // Fermer la requête d'insertion
                      $stmt_insert->close();
                  
              
         
          
        } else {
            echo 'erreur lors du choix';
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
