<?php

// Inclusion de la connexion à la base de données
require_once("conf.php");

require_once("professeur.php");

class Promo {
    public int $c_id;
    public string $nom;
    public int $niveau;
    public int $p_id;
    public Professeur $prof_principal;

    function afficherInfos() {
        echo "<tr><td>" . $this->niveau . 
            "</td><td>" . $this->nom . 
            "</td><td>" . $this->prof_principal->nom . 
            "</td><td>" . $this->prof_principal->prenom . 
            "</td><td>" . $this->prof_principal->adresse_mail . 
            "</td><td>" . "<a href=\"promoDetail.php?id=" . $this->c_id . "\"><button>Afficher</button></a>" .
            "</td></tr>";
    }

    static function readAll(): array {
        // Permet d'aller chercher la variable $pdo à l'extérieur de la fonction (portée globale)
        global $pdo;

        // Ecriture de la requête SQL dans une chaîne de caractères
        $sql = "SELECT c_id, nom, niveau, p_id FROM classes";

        // Préparation de la requête SQL par PDO
        $statement = $pdo->prepare($sql);

        // Exécution de la requête
        $statement->execute();

        // Récupération des résultats de la requête, sous forme de tableau associatif ici
        $liste = $statement->fetchAll(PDO::FETCH_CLASS, "Promo");

        foreach($liste as $promo) {

            // Chargeons les informations du professeur principal sélectionné grâce la propriété id_professeurs de mon objet Promo
            $prof_principal = Professeur::readOne($promo->p_id);

            // Enregistrons les informations du professeur principal dans la propriété prof_principal
            $promo->prof_principal = $prof_principal;
        }

        return $liste;
    }
}