<h1>Fonction pour intéragir avec la base données</h1>
<h2>Répéter pour apprendre parce que mémoire de poisson rouge</h2>

<?php
// Appelle du fichier dans lequel il y a la base de donnée
require 'job01/class/bdd.php';
// Instance de la classe ConnectBDD
$dbConnection = new ConnectBDD();
// Appele de la méthode pour se connecter à la base de données
$pdo = $dbConnection->connectBDD();
?>