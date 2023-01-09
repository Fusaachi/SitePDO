<?php

require_once("personne.php");
class Eleve extends Personne
{
    public string $date_de_naissance;
    // Création d'une propriété statique qui seras commune a tous mes élèves
    public static int $nombre = 0;

    function __construct()
    {
        //Incrémenter le nombre d'élève
        self::$nombre++;
    }
    function afficherInfos()
    {
        echo "<tr> <td>" . $this->nom . "</td>  <td>" . $this->prenom . "</td> <td> " . $this
        ->date_de_naissance . "</td> </tr>";    }
}
?>