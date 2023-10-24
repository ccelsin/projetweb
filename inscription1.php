<?php
    $title_page = " page d'inscription'";
    include("header.inc.php");
?>
<main>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="inputPassword6" class="col-form-label">Password</label>
  </div>
  <div class="col-auto">
    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
  </div>
  <div class="col-auto">
    <span id="passwordHelpInline" class="form-text">
      Must be 8-20 characters long.
    </span>
  </div>
</div>
  <div class="d-grid gap-2 col-6 mx-auto">
  <form action="accueil.php" method="POST" >
  
  <button type="Commencez à jouer maintenant" class="btn btn-outline-primary btn-lg">Commencez à jouer maintenant</button>
  </form>
    </div>
  
 </main>
