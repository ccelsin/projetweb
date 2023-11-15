<?php
    $title_page = " Espace Administrateur";
    include("header.inc.php");
?>
<nav class="navbar navbar-expand-md bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"  role="button" aria-expanded="false">Ajouter </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="Add_Admin.php">Ajouter Admin</a></li>
        <li><a class="dropdown-item" href="Add_Jeu.php">Ajouter Jeu</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="Add_Créneau.php">Ajouter Créneau</a></li>
      </ul>
    </li>
  </div>
</nav>

