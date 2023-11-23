<?php
session_start(); // Pour les messages

// Connexion à la base de données
require_once("param.inc.php");
$con = new mysqli($host, $login, $passwd, $dbname);
if ($con->connect_error) {
    die('Erreur de connexion (' . $con->connect_errno . ') ' . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier'])) {
    $jeu_photos = $_FILES['imageJeu']['name'];
    $nouveauNom = htmlentities($_POST['nameJ']);
    $nouvelleCategorie = htmlentities($_POST['nouvelleCategorie']);
    $regle = $_FILES['pdfDocument']['name'];
   
    $uploadImage = "../projetweb/images/".$jeu_photos; 
    $uploadPDF = "../projetweb/docpdf/".$regle;

move_uploaded_file($_FILES['imageJeu']['tmp_name'], $uploadImage); 
move_uploaded_file($_FILES['pdfDocument']['tmp_name'], $uploadPDF);
    // Vérifier si le jeu avec l'ID spécifié existe
    if ($stmtCheckExistence = $con->prepare("SELECT name FROM jeu WHERE name=?")) {
        $stmtCheckExistence->bind_param("s", $nouveauNom);
        $stmtCheckExistence->execute();
        $stmtCheckExistence->store_result();

        // Si le jeu n'existe pas, rediriger ou afficher un message d'erreur
        if ($stmtCheckExistence->num_rows == 0) {
            echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
       
       
          <script src="../js/bootstrap.min.js"></script>';
       
            echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <strong class="me-auto">Notification</strong>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
             Le Jeu'$name'est inexistant!
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
                window.location.href = 'espace_Admin.php';
              }, 4000);
          </script>";
        }

        // Fermer le statement de vérification
        $stmtCheckExistence->close();
    }

    // Mettre à jour les informations du jeu dans la base de données
    if ($stmt = $mysqli->prepare("UPDATE jeu SET images=?, nom=?, categorie=?, regle=?,  WHERE nom=?")) {
        $stmt->bind_param("ssss", $nouveauNom, $nouvelleCategorie, $regle, $jeu_photos, );


        // Exécuter la mise à jour
        if ($stmt->execute()) {
            echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
       
       
          <script src="../js/bootstrap.min.js"></script>';
       
            echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <strong class="me-auto">Notification</strong>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              Le Jeu '$name' est modifié avec succès!
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
                window.location.href = 'espace_Admin.php';
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
              Echec de la modification du jeu '$name'!
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
                window.location.href = 'espace_Admin.php';
              }, 4000);
          </script>"; . $stmt->error;
        }

        // Fermer le statement
        $stmt->close();
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
          Erreur de préparation de la requete!
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
            window.location.href = 'espace_Admin.php';
          }, 4000);
      </script>"; . $con->error;
    }
}

// Fermer la connexion à la base de données
$mysqli->close();

// Redirection vers la page d'accueil par exemple :
header('Location: espace_Admin.php');
?>
