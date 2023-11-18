<?php
    //On vérifie si les champs existent et s'ils ont été remplis
    if(isset($_POST["nom"],$_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"])){

      $firstname = strip_tags($_POST["nom"]);
      $lastname = strip_tags($_POST["prenom"]);

      //On enregistre les premières informations dans la base de données

      require_once"database.php";
      $db = Database::connect();
      $sql = "INSERT INTO `utilisateurs` (`id`, `first_name`, `last_name`, `email`, `password`, `avatar`, `privilège`) VALUES (NULL, ':firstname', ':lastname', '', '', '', 'membre')";
      $statement = $db->prepare($sql);
      $statement->bindValue(":firstname", $firstname, PDO::PARAM_STR);
      $statement->bindValue(":lastname", $lastname, PDO::PARAM_STR);
      $statement->execute();

    }else{
      //die("Le formulaire est imcomplet");
    }


    $title_page = " page de renseignement";

    include("header.inc.php");
?>
 
  <div class="d-grid gap-2 col-6 mx-auto">
    <form action="inscription1.php" method="POST" >
      <div>
        <div class="mb-3 row">
          <label for="nom" class="col-sm-2 col-form-label">nom</label>
          <div class="col-sm-10">
             <input type="text" name="nom" class="form-control" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="prenom" class="col-sm-2 col-form-label">prenom</label>
          <div class="col-sm-10">
            <input type="text" name="prenom" class="form-control" required>
          </div>
        </div>
       
      </div>
      <button type="submit" class="btn btn-outline-primary btn-lg">Suivant</button>
    </form>
  </div>

