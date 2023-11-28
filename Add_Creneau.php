<?php
session_start();

require_once("roleAdmin.php");
?>

<?php

$titre = "Modifier un jeu";
include 'header.inc.php';

require_once("database1.php");

$con = new mysqli($host, $login, $passwd, $dbname);

if ($con->connect_error) {
    die("La connexion à la base de données a échoué : " . $con->connect_error);
} else {
    // ici on récupère l'id du jeu à modifier
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $sql = "SELECT * FROM jeu WHERE id = '$id';";
    $stm = $con->query($sql);
    $resultat = $stm->fetch_assoc();

    $nom = $resultat["nom"];
    $categorie = $resultat["categorie"];
    $regle = $resultat["regle"];
    $images = $resultat["images"];
    $_SESSION['id'] = $id;
    
}
$con->close();
?>

<html>
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE-edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="style.css">
                <link rel="stylesheet" href="fond.css">
            </head>
            <body>
                    <h2  class="text-center">Ajouter un jeu</h2>
                    <form method="POST" action="tt_Add_creneau.php" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                            <div class="col-md-3">
                <div class="col-md-6">
                    <label for="id" class="form-label">id</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="<?php echo $id; ?>" required readonly>
                </div>
            </div>
                                <div class="col-md-6">
                                    <label for="categorie" class="form-label" >Game date</label>
                                    <input type="date" class="form-control " id="Categorie" name="game_date" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="formFilePDF" class="form-label"> Début</label>
                                    <input type="time" class="form-control" id="start" name="start"  required>
                                </div>
                                <div class="col-md-6">
                                    <label for="formFilePDF" class="form-label"> Fin</label>
                                    <input type="time" class="form-control" id="end" name="end"  required>
                                </div>
                            </div>
                           
                            <div class="row my-3">
                                <div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-primary" type="submit" >Ajouter le créneau</button></div>  
                            </div>
                        </div>
                    </form>
            </body>
</html>




