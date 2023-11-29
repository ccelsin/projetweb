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