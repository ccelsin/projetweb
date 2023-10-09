<?php
    $title_page = "Page d'accueil ";
    include("header.inc.php");
?>

<body>
   
    <form action="index_traitement.php" method="POST">
        votre nom:<input type="text" name="nom" ><br>
        votre prenom:<input type="text" name="prenom" ><br>
        votre age:<input type="number" name="age" ><br>
         password:<input type="password" name="password" ><br>
        <input type="submit" value="Envoyer !" ><br>


    </form>
</body>
</html>