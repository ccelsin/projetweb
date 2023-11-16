<?php

   $title_page = " page de connexion";
    include("header.inc.php");
?>

  <form class="form" action="espace_Admin.php" method="POST" style="margin:50px;">
    <div class="form-group">
      <label for="email" class="form-label">Email address</label>
      <input type="text" name="email" id="email" class="form-control" placeholder="name@example.com" required>
    </div>
    <div class="form-group">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="*******" required>
    </div>
    
    <button type="submit" class="btn btn-outline-primary btn-lg">Se connecter</button>
  </form>
  