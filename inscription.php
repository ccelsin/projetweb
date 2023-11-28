<?php
session_start();
    $title_page = " Page d'inscription";
    include("header.inc.php");
?>


<nav class="navbar navbar-expand-md bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="index.php">Family League Arena</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-lg-0">
      <a class="navbar-brand" href="Liste_Jeux.php">Nos Jeux</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        </ul>
        <ul class="navbar-nav mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link" href="connexion.php">Se connecter</a>
        </li>
</ul>
    </div>
  </div>
</nav>









<div class="d-grid d-flex justify-content-center align-items-center gap-3 col-8 mx-auto col-lg-4 col-sm-8" style="margin-top:18vh">
    <form action="tt_inscription.php" method="POST" >
        <div class="form-group">
            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
            <input type="text" name="nom" class="form-control" placeholder="Votre nom..." required>
        </div>
        <div class="form-group">
            <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
            <input type="text" name="prenom" class="form-control" placeholder="Votre prénom..."required>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email address</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="name@example.com" required>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="*******" required>
            <span id="passwordHelpInline" class="form-text">Must be 8-20 characters long.</span>
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
        </div>
        <button type="submit" class="btn btn-outline-primary btn-lg" style="margin-top:5vh">Confirmer</button>
    </form>
</div>

