
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
        <li><a class="dropdown-item" href="Créneau.php">Ajouter creneau</a></li>
      </ul>
    </li>
    </ul> 
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me auto mb-lg-0">
      <a class="navbar-brand" href="Jeux.php">Liste Jeux</a>
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
      
    <a class="navbar-brand fw-bold " href="PlanningAdmin.php">Planning</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        </ul>
        <ul class="navbar-nav mb-lg-0">
        <a class="navbar-brand" href="notifications.php">Notifications</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </ul>
      <ul class="navbar-nav me auto mb-lg-0">
      <a class="navbar-brand" href="index.php">Se déconnecter</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        </ul>
    </nav>