<?php
    $title_page = " page d'inscription";
    include("header.inc.php");
?>
<body>
<?php

<img src="/picture/fond d'écran app.png" alt="fond d'ecran">
    echo "<p>Bienvenue a la Family League Arena!</p>";
    echo "<p>Rejoignez le plus grand jeux de table</p>";
    echo "<p>au monde</p>";
    echo "<p>Qu'attendez vous!!</p>";

   
    echo "<p>Bonjour en php!!</p>";
    $maintenant = new DateTime();
    $maintenant->setTimezone(new DateTimezone('Europe/Paris'));
    echo"<p>Nous sommes le".$maintenant-> format('d/m/Y')."</p>\n";

    ?>

</body>
</html>