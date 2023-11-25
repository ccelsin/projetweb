<?php
session_start();
$titre = "Modifier un jeu";
include 'header.inc.php';

require_once("roleadmin.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fond.css">
    <title>Modifier un jeu</title>
</head>

<body>

    <h2 class="text-center">Modifier un jeu</h2>
    <form method="POST" action="tt_Mod_Jeu.php" enctype="multipart/form-data">
        <div class="container">
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="nouveauNom" class="form-label">nom du jeu</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder=" nom du jeu à modifier" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="nouveauNom" class="form-label">Nouveau nom du jeu</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nouveau nom du jeu" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="nouvelleCategorie" class="form-label">Nouvelle catégorie</label>
                    <input type="text" class="form-control" id="nouvelleCategorie" name="nouvelleCategorie" placeholder="Nouvelle catégorie du jeu" required>
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
            <div class="row my-3">
                <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-outline-primary" type="submit" name="modifier">Enregistrer les modifications du jeu</button>
                </div>
            </div>
        </div>
    </form>

   
</body>

</html>
