<?php
session_start();
    $title_page = " Page d'inscription";
    include("header.inc.php");
?>

<div class="d-grid gap-2 col-6 mx-auto">
    <form action="tt_inscription.php" method="POST" >
        <div class="mb-3 row">
            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
            <input type="text" name="nom" class="form-control" placeholder="Votre nom..." required>
        </div>
        <div class="mb-3 row">
            <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
            <input type="text" name="prenom" class="form-control" placeholder="Votre prénom..."required>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email address</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="name@example.com" required>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="*******" required>
            <span id="passwordHelpInline" class="form-text">Must be 8-20 characters long.</span>
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
        </div>
        <button type="submit" class="btn btn-outline-primary btn-lg">Confirmer</button>
    </form>
</div>

