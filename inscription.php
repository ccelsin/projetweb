<?php
    $title_page = " page de rensaignement";
    include("header.inc.php");
?>
<main>
    <div>
    
    <div class="mb-3 row">
    <label for="nom" class="col-sm-2 col-form-label">nom</label>
    <div class="col-sm-10">
      <input type="nom"  class="form-control" nom="nom">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="prenom" class="col-sm-2 col-form-label">prenom</label>
    <div class="col-sm-10">
      <input type="prenom" class="form-control" prenom="prenom">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="adresse" class="col-sm-2 col-form-label">adresse</label>
    <div class="col-sm-10">
      <input type="adresse" class="form-control" adresse="adresse">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="code_postale" class="col-sm-2 col-form-label">Code Postale</label>
    <div class="col-sm-10">
      <input type="code_postale" class="form-control" Code Postale ="code_postale">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="numéro" class="col-sm-2 col-form-label">Contact</label>
    <div class="col-sm-10">
      <input type="numéro" class="form-control" Contact ="numéro">
    </div>
  </div>
     
  </div>
  <div class="d-grid gap-2 col-6 mx-auto">
  <form action="inscription1.php" method="POST" >
  
  <button type="Suivant" class="btn btn-outline-primary btn-lg">Suivant</button>
  </form>
    </div>
  
 </main>
