<?php
session_start();

require_once("roleAdmin.php");
?>

<?php
$title_page = " Espace Administrateur";
    $titre = "Ajouter jeux";
    include 'header.inc.php';
    
    
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
                    <form method="POST" action="tt_Add_Jeu.php" enctype="multipart/form-data">
                        <div class="container">
                             <div class="row">
                                <div class="col-md-6">
                                    <label for="formFileMultiple" class="form-label" >Image du jeu</label>
                                    <input type="file" class="form-control" id="imageJeu" name="imageJeu" accept="image/*" required>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label for="nom" class="form-label" >Nom du jeu</label>
                                    <input type="text" class="form-control " id="nom" name="nom" placeholder="Nom du jeu" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="categorie" class="form-label" >Catégorie</label>
                                    <input type="text" class="form-control " id="Categorie" name="categorie" placeholder="categorie du jeu" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="formFilePDF" class="form-label"> Les règles (Document PDF)</label>
                                    <input type="file" class="form-control" id="pdfDocument" name="pdfDocument" accept=".pdf" required>
                                </div>
                            </div>
                           
                            <div class="row my-3">
                                <div class="d-grid gap-2 d-md-block"><button class="btn btn-outline-primary" type="submit" >Ajouter le jeu</button></div>  
                            </div>
                        </div>
                    </form>
            </body>
</html>

