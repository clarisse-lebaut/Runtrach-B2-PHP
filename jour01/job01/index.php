<!-- //TODO : JOB 1 - COMPTER LE NOMBRE D'OCCURRENCES -->

<?php
function my_str_search(string $haystack, string $needle): int
{
    // initialise un compteur qui compte le nombre d'occurences
    $count = 0;
    // paramétrer la longueur de la phrase, on utilise une fonction native dans laquelle on place une variable comme valeur
    $lenghString = strlen($haystack);

    /*
        *Faire une boucle sur laquelle il faut itérer dans la chaîne de caractère
        le i permet de crée un index qui va parcourir toute les lettres de la string
        on l'initialise à 0
        on lui dit d'itérer tant sur toute la longeur de la string qu'on a précédemment paramétrer
        i++ permet d'ajouter +1 tant que la string est lu à l'index crée au dédut de la paranthèse
    */
    for ($i = 0; $i < $lenghString; $i++) {

        /*
            *condition de réalisation
            si la lettre trouvé dans l'index est strictement égale à $needle, alors ajoute +1 au nombre de l'index
        */
        if ($haystack[$i] === $needle) {
            $count++;
        }
    }

    // et on stock dans un return le nombre qu'il y a dans la variable count
    return $count;
}


$haystack = "La Plateforme";
$needle = "a";
$result = my_str_search($haystack, $needle);

echo "Le nombre de $needle est $result"
?>