<?php
// Vérifie si l'utilisateur est authentifié et a le rôle d'admin
if (isset($_SESSION['PROFILE']['id']) && isset($_SESSION['PROFILE']['statut']) && $_SESSION['PROFILE']['statut'] == 0) {
    // L'utilisateur est authentifié en tant qu'admin, affichez le contenu admin
} else {
    // L'utilisateur n'est pas authentifié ou n'a pas les autorisations nécessaires
    header('Location: index.php');
    exit();
}

?>