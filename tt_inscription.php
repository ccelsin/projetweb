<?php
  session_start(); // Pour les messages

  // Contenu du formulaire :
  $nom =  htmlentities($_POST['nom']);
  $prenom = htmlentities($_POST['prenom']);
  $email =  htmlentities($_POST['email']);
  $password = htmlentities($_POST['password']);
  $role = 0; 

  // Option pour bcrypt
  $options = [
        'cost' => 12,
  ];

  // Connexion :
  require_once("database1.php");
  $con = new mysqli($host, $login, $passwd, $dbname);
  if ($con->connect_error) {
      die('Erreur de connexion (' . $con->connect_errno . ') '
              . $con->connect_error);
  }
else{
// Attention, ici on ne vérifie pas si l'utilisateur existe déjà
if ($stmt = $con->query("INSERT INTO utilisateurs(nom, prenom, email, mdp, statut) VALUES ('$nom','$prenom', '$email', '$password', '$role')")) {
    //$password = password_hash($password, PASSWORD_BCRYPT, $options);
    // Le message est mis dans la session, il est préférable de séparer message normal et message d'erreur.
    if($stmt) {
       
       
        echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   
   
      <script src="../js/bootstrap.min.js"></script>';
   
        echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <strong class="me-auto">Notification</strong>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          Génial!! Vous venez de créer votre compte. Vous pouvez vous connecter et accéder aux jeux!
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
            window.location.href = 'connexion.php';
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
          Cet utilisateur existe deja!
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
            window.location.href = 'index.php';
          }, 4000);
      </script>";

    }
  }
  
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
   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</body>
</html>