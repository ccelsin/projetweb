<?php
    $titre = "Liste des souhaits";
    include("header.inc.php");
    require_once("role_membre.php");
?>

<div class="container">
<h1>Liste des souhaits</h1>



<table id="dataTable" class="table">
  <thead>
    <tr>
    <th scope="col">Images</th>
      <th scope="col">Nom</th>
      <th scope="col">Categorie</th>
      <th scope="col">Creneau de jeu</th>

    <tr>
      
  </thead>
  <tbody>
  
  <?php

// Connexion :
require_once("datacon.php");
$req="SELECT * FROM souhaits";
$ps=$pdo->prepare($req);
$ps->execute();




  while($row=$ps->fetch()) 
  {     
    echo '<tr>'; 
    echo '<td><img src="'.$row['images'].'" style="width:100px; height:100px;"></td>';
    echo'<td>'.$row['nom'].'</td>';
    echo'<td>'.$row['categorie'].'</td>';
    echo "<td><a href=' listcreneaux.php?id=" . $row['id'] . "'>Choisir</a></td>";
    echo '</tr>';
}

?>

</tbody>

</table>

</div>
<?php
   //include 'footer.inc.php';
?>
