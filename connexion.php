<?php
    session_start();
    $title_page = " page de connexion";
    include'header.inc.php';
    include 'database1.php';
?>
<div class="d-grid d-flex justify-content-center align-items-center gap-3 col-8 mx-auto col-lg-4 col-sm-8" style="margin-top:25vh">
  <form  action="tt_connexion.php" method="POST" >
    <div class="form-group">
      <label for="email" class="col-sm-2 col-form-label">Email address</label>
      <input type="text" name="email" id="email" class="form-control" placeholder="name@example.com" required>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-2 col-form-label">Password</label>
      <input type="password" name="password"  class="form-control" placeholder="*******" required>
    </div>
    
  <button type="submit" class="btn btn-outline-primary btn-lg">Se connecter</button>
  </form>
  </div>
  