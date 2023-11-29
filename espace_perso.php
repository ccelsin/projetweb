<?php
session_start();
    $title_page = " Espace Personnel";
    include("header.inc.php");
    include'nav_membre.php';
    $name = $_SESSION['PROFILE']['nom'];
    require_once("role_membre.php");
?>

    <div class="container">
      <h1 class="text-logo"> <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-dice-2" viewBox="0 0 16 16">
      <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3z"/>
      <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m8 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
      </svg> Jeux </h1>
    </div>
    <div class="container">
    <?php
    // Connexion à la base de données
    require_once("database1.php");
    $con = new mysqli($host, $login, $passwd, $dbname);
    if ($con->connect_error) {
        die('Erreur de connexion (' . $con->connect_errno . ') ' . $con->connect_error);
    }else  if (isset($_GET['id'])) {
      $idjeu = $_GET['id'];
  }
    // Requête SELECT pour récupérer les jeux
    $result = $con->query("SELECT id, images, nom, categorie, regle FROM jeu ");
    if ($result) {
      
      // Afficher les jeux s'il y en a
      if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
          $idjeup=$_POST['id'];

          echo'<div class="card" style="width: 18rem;">
          <img class="rounded" src="../projetweb/images/' . $row['images'] . '" alt="Image du jeu">
  <div class="card-body">
    <h5 class="card-title" style="margin-left: 9vw;">' . $row['nom'] . '</h5>
    <a href="tt_favoris.php" class="btn btn-danger" role="button" style="margin-left: 7.8vw;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                  <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                </svg></a>
                <a href="../projetweb/docpdf/' . $row['regle'] . '" class="btn btn-secondary" role="button" style="margin-left: 1vw;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
              </svg></a>
  </div>
</div>';
  }

 
} else {
  echo '<p>Aucun jeu disponible pour le moment.</p>';
}

// Libérer le résultat
$result->free();
} else {
echo 'Erreur lors de la récupération des jeux : ' . $con->error;
}

// Fermer la connexion à la base de données
$con->close();
?>
</div>



