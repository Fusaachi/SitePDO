<?php
// Inclusion de la connexion de la BDD
require_once("conf.php");

// Inclusion de la classe Eleve
require_once("models/eleve.php");

// Ecriture de la requête SQL dans une chaîne de caractères 
$sql = "SELECT nom, prenom, date_de_naissance FROM eleves";

// Préparation de la requête SQL par PDO
$statement = $pdo->prepare($sql);

// Exécution de la requête
$statement->execute();

// Récpération des résultats de la requête, sous forme de tableau associatif ici
$eleves = $statement->fetchAll(PDO::FETCH_CLASS, "Eleve");
// echo"<pre>";
// var_dump($eleves);
// echo "</pre>";
?>


<?php
include("inc/head.php");
?>
    <title>Liste des élèves</title>
<?php
include("inc/header.php"); ?>
    <main>
        <h1>Liste des élèves</h1>
        <table class= "table text-light text-center" >
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
            </tr>
            <?php 
        foreach($eleves as $eleve){
            $eleve->afficherInfos();
        }
?>
        </table>

    </main>
<?php
include("inc/footer.php"); ?>