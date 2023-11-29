<?php

echo'<nav class="navbar navbar-expand-md bg-dark border-bottom border-body" data-bs-theme="dark">
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
    
        </ul>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me auto mb-lg-0">
      <a class="navbar-brand" href="Liste_membres.php">Liste Membres</a>
   
        </ul>
        <ul class="navbar-nav me-auto mb-lg-0">
        <a class="navbar-brand" href="ListE_souhaits.php">Liste souhaits</a>
    
    <a class="navbar-brand" href="Liste_creneaux.php">Liste créneaux</a>
    
    <a class="navbar-brand" href="PlanningAdmin.php">Planning</a>
    
        </ul>
        <ul class="navbar-nav mb-lg-0">
        
    

      <a class="navbar-brand" href="deconnexion.php">Se déconnecter</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        </ul>

      </ul>
    </div>
  </div>
</nav>';
?>
