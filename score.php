<!DOCTYPE HTML>
<?php
include "connexion.php";

$page = "score";

// Récupère la question
$scores = $dbh->query('SELECT * FROM score ORDER BY score DESC')->fetchAll();
?>
<html>
    <head>
        <?php require_once "include/pages/meta.php"; ?>
        <link href="include/css/score.css" rel="stylesheet" type="text/css" />
        <title>LudiSound - Purgatoire</title>
    </head>
    <body>
        <!-- Conteneur du site -->
        <section id="container">
            <!-- Header -->
            <?php require_once "include/pages/header.php"; ?>
            <!-- Menu -->
            <?php require_once "include/pages/menu.php"; ?>
            <!-- Contenu de la page -->
            <article id="content" role="main">
                <h2 id="titre-h2">Scores</h2>
                <table id="table-score">
                    <tr id="tr-titre">
                        <td>n°</td>
                        <td>Pseudo</td>
                        <td>Stage</td>
                        <td><img src="include/images/sphere-level.png" alt="sphere-level" title="Votre Niveau sphère" /></td>
                        <td><img src="include/images/hero-enraged.png" alt="hero-enraged" title="Nombre d'Enragement utilisés"/></td>
                        <td><img src="include/images/monster-blood.png" alt="monster-blood" title="Nombre de monstre tués"/></td>
                        <td><img src="include/images/chest.png" alt="chest" title="Nombre de coffres ramassés"/></td>
                        <td><img src="include/images/clock.png" alt="clock" title="Nombre de chrono récupérés"/></td>
                        <td><img src="include/images/cleared.png" alt="cleared" title="Nombre de salle vidées"/></td>
                        <td>Réponse</td>
                        <td>Score</td>
                    </tr>
                    <?php
                    $i = 1;
                    foreach ($scores as $score) {
                        if ($i == 1) {
                            echo "<tr class='tr-1'>";
                        } else if ($i == 2) {
                            echo "<tr class='tr-2'>";
                        } else if ($i == 3) {
                            echo "<tr class='tr-3'>";
                        } else {
                            echo "<tr>";
                        }
                        echo "<td>".$i."</td>";
                        echo "<td>".$score['pseudo']."</td>";
                        echo "<td>".$score['stage']."</td>";
                        echo "<td>".$score['level']."</td>";
                        echo "<td>".$score['enraged_used']."</td>";
                        echo "<td>".$score['monster_killed']."</td>";
                        echo "<td>".$score['chest_taken']."</td>";
                        echo "<td>".$score['clock_taken']."</td>";
                        echo "<td>".$score['area_cleared']."</td>";
                        echo "<td>".$score['question']."</td>";
                        echo "<td>".$score['score']."</td>";
                        echo "</tr>";
                        $i++;
                    }
                    ?>
                </table>
            </article>
            <!-- Footer -->
            <?php require_once "include/pages/footer.php"; ?>
        </section>
    </body>
</html>