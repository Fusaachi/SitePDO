<?php

require_once("models/promo.php");

$promos = Promo::readAll();

// echo "<pre>";
// var_dump($promos);
// echo "</pre>";

?>
<?php include("inc/head.php"); ?>
    <title>Liste des promotions</title>
<?php include("inc/header.php"); ?>
    <main>
        <h1 class="text-center">Liste des promotions</h1>
        <table class= "table text-light text-center">
            <tr>
                <th>Niveau</th>
                <th>Nom</th>
                <th>Prof principal - Nom</th>
                <th>Prof principal - Prénom</th>
                <th>Prof principal - Email</th>
                <th>Action</th>
            </tr>
            <?php 
                // Afficher les infos de chaque promo et de son prof principal
                foreach($promos as $promo) {
                    $promo->afficherInfos();
                }
            ?>
        </table>
    </main>
<?php include("inc/footer.php"); ?>