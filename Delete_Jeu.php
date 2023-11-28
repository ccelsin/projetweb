<?php
session_start();
require_once("roleAdmin.php");
$titre = "Supprimer un jeu";
include 'header.inc.php';
include 'menuadmin.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fond.css">
    <title>Supprimer un jeu</title>
</head>
<body>
    <h2 class="text-center">Supprimer un jeu</h2>
    <form method="POST" action="tt_delete_Jeu.php">
        <div class="container">
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Nom du jeu à supprimer</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name du jeu" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-danger" type="submit">Supprimer le jeu</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>


