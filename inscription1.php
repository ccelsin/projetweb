<?php

    
    $title_page = " page d'inscription'";
    include("header.inc.php");
?>


  <form action="accueil.php" method="POST" style="margin:50px;">
    <div class="form-group">
      <label for="email" class="form-label">Email address</label>
      <input type="text" id="email" class="form-control" placeholder="name@example.com" required>
    </div>
    <div class="form-group">
      <label for="password" class="form-label">Password</label>
      <input type="password" id="password" class="form-control" placeholder="name@example.com" required>
      <span id="passwordHelpInline" class="form-text">Must be 8-20 characters long.</span>
    </div>
  <div class="d-grid gap-2 col-4 mx-auto">
  <button type="submit" class="btn btn-outline-primary btn-lg">Commencez à jouer maintenant</button>
  </form>
    
  

