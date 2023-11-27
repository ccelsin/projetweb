<?php
    $titre = "Liste des créneaux";
    include("header.inc.php");
?>

<div class="container">
<h1>Liste des créneaux disponible</h1>



<table id="dataTable" class="table">
  <thead>
    <tr>
        <th scope="col">Date</th>
        <th scope="col">Heure de Début</th>
        <th scope="col">Heure de fin</th>
        <th scope="col">Selection</th>

    <tr>
  </thead>
  <tbody>
  <?php

// Connexion :
require_once("datacon.php");
$req="SELECT * FROM creneaux";
$ps=$pdo->prepare($req);
$ps->execute();




  while($row=$ps->fetch()) 
  {     
    echo '<tr>';
    echo'<td>'.$row['game_date'].'</td>';
    echo'<td>'.$row['start'].'</td>';
    echo'<td>'.$row['end'].'</td>';
    echo "<td><a href=' tt_creneaux.php?id=" . $row['id'] . "'>Choisir OU Modifier</a></td>";
    echo '</tr>';
}

?>

</tbody>

</table>

</div>
<?php
   //include 'footer.inc.php';
?>
