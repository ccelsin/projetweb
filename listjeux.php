<?php
session_start();
$title_page = " Liste des Jeux";
include 'database1.php';
include'header.inc.php';
require_once("role_membre.php");
?>

<nav class="navbar navbar-expand-md bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
  <ul class="nav nav-pills">
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"  role="button" aria-expanded="false">Ajouter </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="Add_Admin.php" style="font-color:white">Ajouter Admin</a></li>
        <li><a class="dropdown-item" href="Add_Jeu.php">Ajouter Jeu</a></li>
        <li><a class="dropdown-item" href="creneau.php">Ajouter Créneau</a></li>
      </ul>
    </li>
    </ul> 
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me auto mb-lg-0">
      <a class="navbar-brand fw-bold" href="Jeux.php">Liste Jeux</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        </ul>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me auto mb-lg-0">
      <a class="navbar-brand" href="Liste_membres.php">Liste Membres</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        </ul>
        <ul class="navbar-nav me-auto mb-lg-0">
        <a class="navbar-brand" href="List_souhaits.php">Liste souhaits</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      
    <a class="navbar-brand" href="PlanningAdmin.php">Planning</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        </ul>
        <ul class="navbar-nav mb-lg-0">
        <a class="navbar-brand" href="notifications.php">Notifications</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </ul>
      <ul class="navbar-nav me auto mb-lg-0">
      <a class="navbar-brand" href="index.php">Se déconnecter</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        </ul>
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
            $result = $con->query("SELECT  id, images,  nom, categorie, regle FROM jeu ");

            if ($result) {
                // Afficher les jeux s'il y en a
                if ($result->num_rows > 0) {
                    echo '<h2>Liste des Jeux</h2>';
                    echo '<table class="table mx-auto" style="color: black;">';
                    echo '<tr>
                    <th>Images</th>
                    <th>Nom</th>
                    <th>Catégorie</th> <th>Règles</th>
                    <th>Sélection</th>
                    </tr>';

                    while ($row = $result->fetch_assoc()) {
                      echo '<tr>';
                        echo '<td><img src="../projetweb/images/' . $row['images'] . '" alt="Image du jeu"></td>';
                        echo '<td>' . $row['nom'] . '</td>';
                        echo '<td>' . $row['categorie'] . '</td>';
                        echo '<td><a href="../projetweb/docpdf/' . $row['regle'] .'" download>Télécharger PDF</a></td>';
                        echo "<td><a href=' listcreneaux.php?id=" . $row['id'] . "'>Choisir un créneau</a></td>";       
                        echo '</tr>';
                    }

                    echo '</table>';
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

        