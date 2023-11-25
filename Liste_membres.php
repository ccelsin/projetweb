<?php
    $title_page = " Espace Administrateur";
    include("header.inc.php");
    session_start();
require_once("roleadmin.php");
?>
<nav class="navbar navbar-expand-md bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
  <ul class="nav nav-pills">
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"  role="button" aria-expanded="false">Ajouter </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="Add_Admin.php" style="font-color:white">Ajouter Admin</a></li>
        <li><a class="dropdown-item" href="Add_Jeu.php">Ajouter Jeu</a></li>
        <li><a class="dropdown-item" href="Add_Créneau.php">Ajouter Créneau</a></li>
      </ul>
    </li>
    </ul> 
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me auto mb-lg-0">
      <a class="navbar-brand fw-bold" href="Liste_membres.php">Liste Membres</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        </ul>
        <ul class="navbar-nav me-auto mb-lg-0">
        <a class="navbar-brand" href="List_souhaits.php">Liste souhaits</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      
    <a class="navbar-brand" href="Planning.php">Planning</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        </ul>
        <ul class="navbar-nav mb-lg-0">
        <a class="navbar-brand" href="notifications.php">Notifications</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        
    <a class="navbar-brand" href="Infos.php">Mes infos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        
</ul>
<ul class="navbar-nav mb-lg-0">
        <li class="nav-item">

          <a class="nav-link " href="deconnexion.php">Déconnexion</a>
        </li>

      </ul>
    </div>
  </div>
</nav>


<div class="container text-center">
            <?php
            // Connexion à la base de données
            require_once("database1.php");
            $con = new mysqli($host, $login, $passwd, $dbname);
           
            if ($con->connect_error) {
                die('Erreur de connexion (' . $con->connect_errno . ') ' . $con->connect_error);
            }
             
            // Requête SELECT pour récupérer les jeux
            $result = $con->query("SELECT    nom, prenom, email FROM utilisateurs WHERE statut=0 ");
         

            if ($result) {
                // Afficher les membres s'il y en a
                if ($result->num_rows > 0) {
                    echo '<h2>Liste des Membres</h2>';
                    echo '<table class="table mx-auto" style="color: black;">';
                    echo '<tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Mail</th> 
                    </tr>';

                    while ($row = $result->fetch_assoc()) {
                      echo '<tr>';
                        echo '<td>' . $row['nom'] . '</td>';
                        echo '<td>' . $row['prenom'] . '</td>';
                        echo '<td>' . $row['email'] .'</td>';          
                        echo '</tr>';
                    }

                    echo '</Membre>';
                } else {
                    echo '<p>Aucun membre</p>';
                }

                // Libérer le résultat
                $result->free();
            } else {
                echo 'Erreur lors de la récupération des membres : ' . $con->error;
            }

            // Fermer la connexion à la base de données
            $con->close();
            ?>
        </div>
    



