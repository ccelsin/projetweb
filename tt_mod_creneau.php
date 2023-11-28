<?php
session_start();
require_once("roleAdmin.php");
$id = $_SESSION['id'];
$nouvelledate = $_POST['date'];
$debut = $_POST['debut'];
$fin = $_POST['end'];
require_once("database1.php");
//créer la connexion
$con = new mysqli($host, $login, $passwd, $dbname);
//vérifier la connexion
if ($con->connect_error) {
  die("La connexion à la base de données a échoué : " . $con->connect_error);
}else{
  $sql = "UPDATE creneaux SET game_date= '$nouvelledate' , game_start= '$debut', game_end= '$fin' WHERE id= '$id'";
  if (mysqli_query($con, $sql)) {
    echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
 
 
    <script src="../js/bootstrap.min.js"></script>';
 
      echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Notification</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
      Créneau modifié avec succès.!
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
     Erreur lors de la modification du créneau!
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
    </script>";  mysqli_error($con);
}
}

$con->close();
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