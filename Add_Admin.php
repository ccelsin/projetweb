<?php
session_start();

require_once("roleAdmin.php");
?>

<?php
    $title_page = " page d'ajout de d'admin'";
    include("header.inc.php");
?>
<main>
 
  
<div class="d-grid gap-2 col-6 mx-auto">
    <form action="tt_Add_Admin.php" method="POST" >
        <div class="form-group">
            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
            <input type="text" name="nom" class="form-control" placeholder="Votre nom..." required>
        </div>
        <div class="form-group">
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
  
</main>
