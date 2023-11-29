<?php
// Démarrez la session
session_start();
// Détruisez toutes les variables de session
$_SESSION = array();
// Détruisez la session
session_destroy();
// Redirigez vers la page d'accueil (index.php)
header("Location: index.php");

exit();
?>