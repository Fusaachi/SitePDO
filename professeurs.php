<?php

require_once("models/professeur.php");

$professeurs = Professeur::readAll();

?>
<?php include("inc/head.php"); ?>
    <title>Liste des professeurs</title>
<?php include("inc/header.php"); ?>
    <main>
        <h1 class="text-center" >Liste des professeurs</h1>
        <table class= "table text-light text-center">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
            </tr>
            <?php 
                foreach($professeurs as $professeur) {
                    $professeur->afficherInfos();
                }
            ?>
        </table>
    </main>
<?php include("inc/footer.php"); ?>