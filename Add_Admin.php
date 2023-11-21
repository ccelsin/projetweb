<?php
    $title_page = " page d'ajout de d'admin'";
    include("header.inc.php");
?>
<main>
 
  <div class="d-grid gap-2 col-6 mx-auto">
    <form action="tt_Add_Admin.php" method="POST" >
  <div>
    
    <div class="mb-3 row">
    <label for="nom" class="col-sm-2 col-form-label">nom</label>
    <div class="col-sm-10">
      <input type="nom"  class="form-control" nom="nom" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="prenom" class="col-sm-2 col-form-label">prenom</label>
    <div class="col-sm-10">
      <input type="prenom" class="form-control" prenom="prenom" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label">email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" email="email" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="Password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="Password" class="form-control" Password ="Password" required>
    </div>
  </div>
  
     
  </div>
  <button type="Suivant" class="btn btn-outline-primary btn-lg">Suivant</button>
  </form>
  
    </div>
  
</main>
