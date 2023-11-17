<?php
    //On vérifie si les champs existent et s'ils ont été remplis
    if(isset($_POST["nom"],$_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"])){

    }else{
      die("Le formulaire est imcomplet");
    }


    $title_page = " page de renseignement";
    include("header.inc.php");
?>
 
  <div class="d-grid gap-2 col-6 mx-auto">
    <form action="inscription1.php" method="POST" >
      <div>
        <div class="mb-3 row">
          <label for="nom" class="col-sm-2 col-form-label">nom</label>
          <div class="col-sm-10">
             <input type="nom" name="nom" class="form-control" nom="nom" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="prenom" class="col-sm-2 col-form-label">prenom</label>
          <div class="col-sm-10">
            <input type="prenom" name="prenom" class="form-control" prenom="prenom" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="adresse" class="col-sm-2 col-form-label">adresse</label>
          <div class="col-sm-10">
            <input type="adresse"  class="form-control" adresse="adresse" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="code_postale" class="col-sm-2 col-form-label">Code Postale</label>
          <div class="col-sm-10">
            <input type="code_postale" class="form-control" Code Postale ="code_postale" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="numéro" class="col-sm-2 col-form-label">Contact</label>
          <div class="col-sm-10">
            <input type="numéro" class="form-control" Contact ="numéro" required>
          </div>
        </div>
      </div>
      <button type="Suivant" class="btn btn-outline-primary btn-lg">Suivant</button>
    </form>
  </div>

