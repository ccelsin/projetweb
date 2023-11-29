<?php
session_start();

require_once("roleAdmin.php");
?>
<?php

// Contenu du formulaire$id = htmlentities($_POST['Id']);
$jeu_photos = $_FILES['imageJeu']['name'];
$nom = htmlentities($_POST['nom']);
$categorie = htmlentities($_POST['categorie']);
$regle = $_FILES['pdfDocument']['name'];

// Assure-toi que les types de données dans la base de données correspondent
// Modifie les types de bind_param en conséquence
$uploadImage = "../projetweb/images/" . $jeu_photos;
$uploadPDF = "../projetweb/docpdf/" . $regle;

move_uploaded_file($_FILES['imageJeu']['tmp_name'], $uploadImage);
move_uploaded_file($_FILES['pdfDocument']['tmp_name'], $uploadPDF);

// Connexion à la base de données
require_once("database1.php");
$con = new mysqli($host, $login, $passwd, $dbname);
if ($con->connect_error) {
    die('Erreur de connexion (' . $con->connect_errno . ') ' . $con->connect_error);
}

// Attention, ici on ne vérifie pas si l'utilisateur existe déjà
if ($stmt = $con->prepare("INSERT INTO jeu(images, nom, categorie, regle) VALUES (?, ?, ?, ?)")) {
    // Correction : Utilisation des types appropriés dans bind_param
    $stmt->bind_param("ssss", $jeu_photos, $nom, $categorie, $regle);

    // Exécute la requête
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
      Insertion réussie!
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
          window.location.href = 'Jeux.php';
        }, 4000);
    </script>";
    } else {
        // Affiche un message d'échec et les détails de l'erreur MySQL
        echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
 
 
    <script src="../js/bootstrap.min.js"></script>';
 
      echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Notification</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
      Erreur lors de l\'insertion!
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
          window.location.href = 'Jeux.php';
        }, 4000);
    </script>";
    }

    // Fermer le statement
    $stmt->close();
} else {
    // Affiche un message d'erreur si la préparation de la requête a échoué
    echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
 
 
    <script src="../js/bootstrap.min.js"></script>';
 
      echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Notification</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
      Erreur de préparation de la requète!
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
          window.location.href = 'Jeux.php';
        }, 4000);
    </script>";
}

// Fermer la connexion à la base de données
$con->close();
?>
