<?php
  session_start(); // Pour les massages
  
  if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    // Le reste du code...
} else {
    // Gérer le cas où les indices ne sont pas définis
    echo "Les indices 'email' et/ou 'password' ne sont pas définis dans la requête POST.";
}

  
  $email =  htmlentities($_POST['email']);
 $password = htmlentities($_POST['password']);
  
  // Connexion :
  require_once("database1.php");
  $con = new mysqli($host, $login, $passwd, $dbname);
  if ($con->connect_error) {
      die('Erreur de connexion (' . $con->connect_errno . ') '
              . $con->connect_error);
  }

  
  
  if ($stmt = $con->prepare("SELECT * FROM utilisateurs WHERE email=? limit 1")) 
  {
   
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    // Vérifier s'il y a des erreurs dans la requête
    if ($stmt->error) {
      die('Erreur de requête : ' . $stmt->error);
  }

  $result = $stmt->get_result();


    if($result->num_rows > 0) 
    {     
        $row = $result->fetch_assoc();
        



        // Vérifier le mot de passe avec SHA-1
        $hashedInputPassword = sha1($password);
 
        if ($hashedInputPassword == $row["password"]) {
            // Stocker les informations de l'utilisateur dans la session
           $_SESSION['PROFILE'] = $row;
//Dispose d’un menu contextuel



            //if (password_verify($password,$row["password"])){

            //$_SESSION['PROFILE'] = $row;
                  // Redirection vers la page admin.php ou autres pages en fonction du role (tuteur,admin, etc.);
              
                $_SESSION['message'] = "Authentification réussi pour un role inconnu.";
                if($row["role"]==1)
                {
                  
                  echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
                  integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
             
             
                <script src="../js/bootstrap.min.js"></script>';
             
                  echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="toast-header">
                    <strong class="me-auto">Notification</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                  <div class="toast-body">
                    connection réussie!
                  </div>
                </div>';
             
                  echo ' <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>';
             
             
                  echo "<script>
                  // Affiche le toast de bienvenue après 1 seconde
             
                  setTimeout(function () {
                    var bienvenueToast = new bootstrap.Toast(document.getElementById('bienvenue-toast'));
                    bienvenueToast.show();
                    toast.hide();
             
                  }, 200);
               
                  setTimeout(function () {
                      window.location.href = 'espace_Admin.php';
                    }, 4000);
                </script>";
                }
                else if($row["role"]==0)
                {
                  echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
                  integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
             
             
                <script src="../js/bootstrap.min.js"></script>';
             
                  echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="toast-header">
                    <strong class="me-auto">Notification</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                  <div class="toast-body">
                  connection réussie!
                  </div>
                </div>';
             
                  echo ' <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>';
             
             
                  echo "<script>
                  // Affiche le toast de bienvenue après 1 seconde
             
                  setTimeout(function () {
                    var bienvenueToast = new bootstrap.Toast(document.getElementById('bienvenue-toast'));
                    bienvenueToast.show();
                    toast.hide();
             
                  }, 200);
               
                  setTimeout(function () {
                      window.location.href = 'espace_perso.php';
                    }, 4000);
                </script>";
                }          
            
            }else { 
              echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
             
             
             <script src="../js/bootstrap.min.js"></script>';
             
              echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <strong class="me-auto">Notification</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
              mot de passe ou identifiant incorrect. Veuillez reéssayer!
              </div>
             </div>';
             
              echo ' <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>';
             
             
              echo "<script>
              // Affiche le toast de bienvenue après 1 seconde
             
              setTimeout(function () {
                var bienvenueToast = new bootstrap.Toast(document.getElementById('bienvenue-toast'));
                bienvenueToast.show();
                toast.hide();
             
              }, 200);
             
              setTimeout(function () {
                  window.location.href = 'connexion.php';
                }, 4000);
             </script>";
            }    
        
    }else{
        
      echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
 
 
    <script src="../js/bootstrap.min.js"></script>';
 
      echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Notification</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
      Cet identifiant est inexistant!
      </div>
    </div>';
 
      echo ' <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>';
 
 
      echo "<script>
      // Affiche le toast de bienvenue après 1 seconde
 
      setTimeout(function () {
        var bienvenueToast = new bootstrap.Toast(document.getElementById('bienvenue-toast'));
        bienvenueToast.show();
        toast.hide();
 
      }, 200);
   
      setTimeout(function () {
          window.location.href = 'connexion.php';
        }, 4000);
    </script>";
    }
  // Fermer le statement
  $stmt->close();
}else {
    // Gérer l'erreur si la préparation de la requête échoue
    die('Erreur de préparation de la requête : ' . $con->error);
}
 
// Fermer la connexion à la base de données
$con->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</body>
</html>


<?php
session_start(); // Pour les messages

// Contenu du formulaire :
$nom = htmlentities($_POST['nom']);
$prenom = htmlentities($_POST['prenom']);
$email = htmlentities($_POST['email']);
$password = htmlentities($_POST['password']);
$statut = 0;

// Option pour bcrypt
$options = [
    'cost' => 12,
];

// Connexion :
require_once("database1.php");
$con = new mysqli($host, $login, $passwd, $dbname);
if ($con->connect_error) {
    die('Erreur de connexion (' . $con->connect_errno . ') '
            . $con->connect_error);
} else {
    // Vérifier si l'utilisateur existe déjà
    $checkUserQuery = "SELECT * FROM utilisateurs WHERE email = '$email'";
    $result = $con->query($checkUserQuery);
    

    if ($result->num_rows > 0) {
        // L'utilisateur existe déjà, afficher un message d'erreur
        echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
 
 
    <script src="../js/bootstrap.min.js"></script>';
 
      echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Notification</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Cet utilisateur existe deja!
      </div>
    </div>';
 
      echo ' <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>';
 
 
      echo "<script>
      // Affiche le toast de bienvenue après 1 seconde
 
      setTimeout(function () {
        var bienvenueToast = new bootstrap.Toast(document.getElementById('bienvenue-toast'));
        bienvenueToast.show();
        toast.hide();
 
      }, 200);
   
      setTimeout(function () {
          window.location.href = 'index.php';
        }, 4000);
    </script>";
    } else {
        // L'utilisateur n'existe pas, ajouter à la base de données
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
        $insertUserQuery = "INSERT INTO utilisateurs(nom, prenom, email, mdp, statut) VALUES ('$nom','$prenom', '$email', '$hashedPassword', '$statut')";

            // Afficher un message de succès
            echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
       
       
          <script src="../js/bootstrap.min.js"></script>';
       
            echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <strong class="me-auto">Notification</strong>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              Génial!! Vous venez de créer votre compte. Vous pouvez vous connecter et accéder aux jeux!
            </div>
          </div>';
       
            echo ' <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>';
       
       
            echo "<script>
            // Affiche le toast de bienvenue après 1 seconde
       
            setTimeout(function () {
              var bienvenueToast = new bootstrap.Toast(document.getElementById('bienvenue-toast'));
              bienvenueToast.show();
              toast.hide();
       
            }, 200);
         
            setTimeout(function () {
                window.location.href = 'connexion.php';
              }, 4000);
          </script>";
      
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</body>
</html>
