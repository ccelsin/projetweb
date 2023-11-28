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



    <h2 class="text-center">Modifier un jeu</h2>
    <form method="POST" action="tt_mod_Jeu.php" enctype="multipart/form-data">
        <div class="container">
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="id" class="form-label">id</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="<?php echo $id; ?>" required readonly>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="nouveauNom" class="form-label">Nouveau nom du jeu</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nouveau nom du jeu" value="<?php echo $nom; ?>" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="nouvelleCategorie" class="form-label">Nouvelle catégorie</label>
                    <input type="text" class="form-control" id="nouvelleCategorie" name="nouvelleCategorie" placeholder="Nouvelle catégorie du jeu" value="<?php echo $categorie; ?>" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="formFilePDF" class="form-label"> Les règles (Document PDF)</label>
                    <input type="file" class="form-control" id="nouvellesRegles" name="pdfDocument" placeholder="Nouvelles règles du jeu" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="imageJeu" class="form-label">Nouvelle image du jeu</label>
                    <input type="file" class="form-control" id="imageJeu" name="imageJeu" accept="image/*" required>
                </div>
            </div>
            <div class="d-grid gap-2 col-4 mx-auto">
        </div>
        <button type="submit" class="btn btn-outline-primary btn-lg">Confirmer les modifications</button>
        </div>
    </form>

