<?php
    $title_page = " page d'accuueil";
    include("header.inc.php");
?>
<main>
    <form action="connexion.php" method="POST" >
        <input type="submit" value="Se connecter" ><br>
    </form>
    <form action="inscription.php" method="POST" >
        <input type="submit" value="S'inscrire" ><br>
    </form>
</main>
