<?php
    $title_page = " Espace Administrateur";
    include("header.inc.php");
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
  </div>
</nav>

<ul class="navbar-nav me-auto mb-lg-0">
      <a class="navbar-brand" href="Liste_Jeux.php">Nos Jeux</a>