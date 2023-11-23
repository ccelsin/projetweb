<?php
session_start();
$titre = "Jeux";
include 'database1.php';

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fd-2.css">
</head>

<body>
    <section class="home">
        <div class="container text-center">
            <?php
            // Connexion à la base de données
            require_once("param.inc.php");
            $mysqli = new mysqli($host, $login, $passwd, $dbname);
            if ($mysqli->connect_error) {
                die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
            }

            // Requête SELECT pour récupérer les jeux
            $result = $mysqli->query("SELECT  images,  nom, categorie, regle,  FROM jeu");

            if ($result) {
                // Afficher les jeux s'il y en a
                if ($result->num_rows > 0) {
                    echo '<h2>Liste des Jeux</h2>';
                    echo '<table class="table mx-auto" style="color: black;">';
                    echo '<tr><th>Nom</th><th>Catégorie</th><th>Règles</th><th>Image</th></tr>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<td><img src="../projetweb/images/' . $row['images'] . '" alt="Image du jeu"></td>';
                        echo '<tr>';
                        echo '<td>' . $row['nom'] . '</td>';
                        echo '<td>' . $row['categorie'] . '</td>';
                        echo '<td><a href="../projetweb/docpdf/' . $row['regle'] .'" download>Télécharger PDF</a></td>';
                        echo '<td>
                                    <form method="POST" action="tt_mod_Jeu.php">
                                        <input type="hidden" name="game_id" value="' . $row['nom'] . '">
                                        <button class="btn btn-primary" type="submit">Modifier</button>
                                    </form>
                                </td>';
                        echo '<td> 
                                    <form method="POST" action="tt_delete_Jeu.php">
                                        <input type="hidden" name="game_id" value="' . $row['nom'] . '">
                                        <button class="btn btn-primary" type="submit">Supprimer</button>
                                    </form>
                                </td>';
                        echo '</tr>';
                    }

                    echo '</table>';
                } else {
                    echo '<p>Aucun jeu disponible pour le moment.</p>';
                }

                // Libérer le résultat
                $result->free();
            } else {
                echo 'Erreur lors de la récupération des jeux : ' . $mysqli->error;
            }

            // Fermer la connexion à la base de données
            $mysqli->close();
            ?>
        </div>
    </section>
</body>

</html>

<?php
include 'footer.inc.php';
?>