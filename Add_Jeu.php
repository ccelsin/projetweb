<?php
include 'database.php';

// Supposons que vous ayez reçu ces données via un formulaire POST
$name = $_POST['name'];
$description = $_POST['description'];
$rules = $_POST['rules'];
$max_Joueurs = $_POST['Max_Joueurs'];
$photos = $_POST['photos'];
// Préparez la requête SQL pour insérer des données dans la table "utilisateurs"
$requete = "INSERT INTO jeux (name, description, rules, Max_Joueurs, photos) VALUES ('$name', '$description', '$rules', '$max_Joueurs', '$photos')";

// Exécutez la requête
if ($connexion->query($requete) === TRUE) {

    echo "Données ajoutées avec succès.";
} else {
    echo "Erreur lors de l'ajout des données : " . $connexion->error;
}

// Fermez la connexion à la base de données
$connexion->close();

$title_page = " page d'ajout de Jeux";
    include("header.inc.php");
?>

<div class="d-grid gap-2 col-6 mx-auto">
    <form action="espace_Admin.php" method="POST" >
      <div>
        <div class="mb-3 row">
          <label for="name" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
             <input type="name" name="name" class="form-control" Name="name" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="description" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-10">
            <input type="description" name="description" class="form-control" Description="description" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="rules" class="col-sm-2 col-form-label">Rules</label>
          <div class="col-sm-10">
            <input type="file"  class="form-control" accept=".pdf" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="max_Joueurs" class="col-sm-2 col-form-label">Max_Joueurs</label>
          <div class="col-sm-10">
            <input type="max_Joueurs" class="form-control" Max_Joueurs="max_Joueurs" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="photos" class="col-sm-2 col-form-label">Photos</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" accept=".png" required>
          </div>
        </div>
      </div>
      <button type="Suivant" class="btn btn-outline-primary btn-lg">Ajouter</button>
    </form>
  </div>

  <?php
    $title_page = " Espace Personnel";
    include("header.inc.php");
?>
<nav class="navbar navbar-expand-md bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="Liste.php">Liste des Jeux</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me auto mb-lg-0">
      <a class="navbar-brand" href="historique.php">Historique des Jeux</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        </ul>
        <ul class="navbar-nav me-auto mb-lg-0">
        <a class="navbar-brand" href="Favoris.php">Favoris</a>
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
        
    <a class="navbar-brand" href="index.php">Se déconnecter</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
</ul>
    </div>
  </div>
</nav>
navbar-brand fw-bold