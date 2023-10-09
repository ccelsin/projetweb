<?php
    $title_page = " page d'inscription";
    include("header.inc.php");
?>
<body>
<?php
   
    echo "<p>Bonjour en php!!</p>";
    $maintenant = new DateTime();
    $maintenant->setTimezone(new DateTimezone('Europe/Paris'));
    echo"<p>Nous sommes le".$maintenant-> format('d/m/Y')."</p>\n";
    ?>

</body>
</html>