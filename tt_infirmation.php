<?php
session_start();


require_once("database1.php");

require_once("roleAdmin.php");

if (isset($_GET['id'])) {
    $ide = $_GET['id'];
}
// Créer une connexion
$con = new mysqli($host, $login, $passwd, $dbname);

// Vérifier la connexion
if ($con->connect_error) {
    die("La connexion à la base de donnée
   
    s a échoué : " . $conn->connect_error);
} else {
    $states = "refusé";
    $sql = "UPDATE souhaits SET statut =  '$states' WHERE id_creneau = '$ide';";
    $stm = $con->query("SELECT * FROM souhaits WHERE id_creneau = '$ide'");
    $resultat = $stm->fetch_assoc();
    $cren = $resultat['id_creneau'];
    $uti = $resultat['id_membre'];

    $stm2 = $con->query("SELECT email FROM souhaits INNER JOIN utilisateurs ON (id_membre = id) WHERE id_creneau = '$id_creneau'");
    $resultat = $stm2->fetch_assoc();
    $emaill = $resultat['email'];


    $stm1 = $con->query("DELETE FROM souhaits WHERE id_membre = '$uti' AND id_creneau = '$cren';");
    echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


  <script src="../js/bootstrap.min.js"></script>';

    echo '<div id="bienvenue-toast" class="toast position-fixed top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Notification</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Vous avez refusé le créneau!
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
        window.location.href = 'liste_souhaits.php';
      }, 4000);
  </script>";

    } else {
        echo "Erreur lors de l'ajout de l'image : " . mysqli_error($con);
    }
}

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</body>

</html>