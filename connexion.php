<?php
    $title_page = " page de connexion";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['se_connecter'])) {
      $email = $_POST["email"];
      $mot_de_passe = $_POST["mot_de_passe"];
  
      $requete = "SELECT * FROM utilisateurs WHERE email='$email'";
      $resultat = $connexion->query($requete);
  
      if ($resultat->num_rows == 1) {
          $utilisateur = $resultat->fetch_assoc();
          if (password_verify($mot_de_passe, $utilisateur["mot_de_passe"])) {
              // Authentification réussie
              if ($utilisateur["role"] == "admin") {
                  header("Location: espace_Admin.php");
              } elseif ($utilisateur["role"] == "membre") {
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
  }
    include("header.inc.php");
    include 'database.php';



?>

  <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="margin:50px;">
    <div class="form-group">
      <label for="email" class="form-label">Email address</label>
      <input type="text" id="email" class="form-control" placeholder="name@example.com" required>
    </div>
    <div class="form-group">
      <label for="password" class="form-label">Password</label>
      <input type="password" id="password" class="form-control" placeholder="*******" required>
    </div>
    
    <button type="Se connecter" class="btn btn-outline-primary btn-lg">Se connecter</button>
  </form>
  