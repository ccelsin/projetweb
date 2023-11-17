<?php
    $title_page = " page de connexion";
    

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Se connecter'])) {
      $email = $_POST["email"];
      $password = $_POST["password"];
  
      $requete = "SELECT * FROM utilisateurs WHERE email='$email'";
      $resultat = $connexion->query($requete);
  
      if ($resultat->num_rows == 1) {
          $utilisateurs = $resultat->fetch_assoc();
          if (password_verify($password, $utilisateur["password"])) {
              // Authentification réussie
              if ($utilisateurs["privilégz"] == "Admin") {
                  header("Location: espace_Admin.php");
              } elseif ($utilisateurs["role"] == "membre") {
                  header("Location: espace_perso.php");
              } else {
                  echo "Rôle non reconnu.";
              }
              exit();
          } else {
              echo "Mot de passe incorrect.";
          }
      } else {
          echo "Aucun utilisateur trouvé avec cet email.";
      }
      include("header.inc.php");
    include 'database.php';
  }

?>

  <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="margin:50px;">
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
  