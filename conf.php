<?php
// Constantes de connexion à la base de données
define("DB_NAME", "college_correction");

define("DB_USER", "root");

define("DB_PASSWORD", "");

define("DB_HOST", "localhost");

// Connexion à la base de données grâce à PDO
$pdo = new PDO("mysql:dbname=" . DB_NAME . ";host=" . DB_HOST, DB_USER, DB_PASSWORD)
?>