
<?php
session_start();

require_once("roleAdmin.php");
?>
<?php

$titre = "Modifier un jeu";
include 'header.inc.php';
include_once("roleAdmin.php");
include_once("nav_admin.php");
require_once("database1.php");

$con = new mysqli($host, $login, $passwd, $dbname);

if ($con->connect_error) {
    die("La connexion à la base de données a échoué : " . $con->connect_error);
} else {
    // ici on récupère l'id du jeu à modifier
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $sql = "SELECT * FROM creneaux WHERE id = '$id';";
    $stm = $con->query($sql);
    $resultat = $stm->fetch_assoc();

    $jeu = $resultat["jeu"];
    $game_date = $resultat["game_date"];
    $game_start = $resultat["game_start"];
    $game_end = $resultat["game_end"];
    $_SESSION['id'] = $id;
    
}
$con->close();
?>



    <h2 class="text-center">Modifier un jeu</h2>
    <form method="POST" action="tt_mod_creneau.php" enctype="multipart/form-data">
        <div class="container">
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="id" class="form-label">Jeu</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="<?php echo $jeu; ?>" required readonly>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="nouveauNom" class="form-label">Nouvelle date</label>
                    <input type="date" class="form-control" id="date" name="date"  value="<?php echo $game_date; ?>" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="nouvelleCategorie" class="form-label">Début</label>
                    <input type="time" class="form-control" id="debut" name="debut"  value="<?php echo $game_start; ?>" required>
                </div>
            </div>
            
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="nouvelleCategorie" class="form-label">Fin</label>
                    <input type="time" class="form-control" id="debut" name="end"  value="<?php echo $game_end; ?>" required>
                </div>
            </div>
            <div class="d-grid gap-2 col-4 mx-auto">
        </div>
        <button type="submit" class="btn btn-outline-primary btn-lg">Confirmer les modifications</button>
        </div>
    </form>

