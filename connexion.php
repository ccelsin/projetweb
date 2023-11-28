<?php
    session_start();
    $title_page = " page de connexion";
    include'header.inc.php';
    include 'database1.php';
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
          <a class="nav-link" href="inscription.php">S'inscrire</a>
        </li>
        
</ul>
    </div>
  </div>
</nav>








<div class="d-grid d-flex justify-content-center align-items-center gap-3 col-8 mx-auto col-lg-4 col-sm-8" style="margin-top:25vh">
  <form  action="tt_connexion.php" method="POST" >
    <div class="form-group">
      <label for="email" class="col-sm-2 col-form-label">Email address</label>
      <input type="text" name="email" id="email" class="form-control" placeholder="name@example.com" required>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-2 col-form-label">Password</label>
      <input type="password" name="password"  class="form-control" placeholder="*******" required>
    </div>
    
    <button type="submit" class="btn btn-outline-primary btn-lg" style="margin-top:5vh">Se connecter</button>
  </form>
  </div>
  