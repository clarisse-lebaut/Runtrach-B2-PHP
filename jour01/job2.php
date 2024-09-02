<h1>JOB 2 : Renverser une chaîne de caractères</h1>

<h2>Avec la fonction strrev()</h2>
<?php
function my_reverse_string(string $string): string
{
    $action = strrev($string);
    return $action;
}

$result1 = my_reverse_string('boum');
echo "Avant renversement : boum.<br>Après renversement : $result1.";

echo "<br>";
echo "<br>";

$sentence = "Personne, le plus grand des anonymes";
$result2 = my_reverse_string($sentence);
echo "Avant renversement : $sentence.</br>Après renversement : $result2."
    ?>

<h2>Avec une la fonction isset() dans une boucle while</h2>
<?php
function inverserChaine($chaine)
{
    // déclarer une chaine de caracètre (vide)
    $chaineInverse = '';
    // initaliser un index à partir de 0
    $i = 0;

    // trouver la longueur de la chaîne
    // tant que l'index de la chaine n'est pas non null, on incrément l'index
    for ($i = 0; isset($chaine[$i]); $i++) {
        $longueur++;
    }

    // Parcourir la chaîne de la fin au début, permet de la construire directement
    /*
        le -1 indique qu'il faut commencer du dernier caractère indexé
        le i-- permet de décrémenter, au lieu d'ajouter --> on enlève dans l'index
        le . en PHP permet de concaténer (assembler des chaînes)
            .= est une version abrégé, qui se met uniquement entre les deux élément que l'on veut joindre
    */
    for ($i = $longueur - 1; $i >= 0; $i--) {
        // donc ici on assemble les éléments, caractère par caractère en remontant dans le sens inverse du mots intiial
        $chaineInverse .= $chaine[$i];
    }

    return $chaineInverse;
}

$chaineInverse = my_reverse_string('boum');
echo "Avant renversement : boum.<br>Après renversement : $chaineInverse.";
?>