<h1>JOB 1 - COMPTER LE NOMBRE D'OCCURRENCES</h1>

<h2>Avec la fonction strlen()</h2>
<?php
function my_str_search_native(string $haystack, string $needle): int
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
$result = my_str_search_native($haystack, $needle);

echo "La lettre $needle dans la string $haystack est utilisé $result fois."
    ?>

<h2>Avec la fonction isset()</h2>

<?php
function my_str_search(string $haystack, string $needle): int
{
    // initialise un compteur qui compte le nombre d'occurences
    $count = 0;

    /*
        *Faire une boucle sur laquelle il faut itérer dans la chaîne de caractère
        le i permet de crée un index qui va parcourir toute les lettres de la string
        on l'initialise à 0
        on lui dit d'itérer tant que isset est vrai
        ? isset() permet de vérifier si une variable est définie et non nulle
        ? dans cette fonction, il permet de dire que dans que l'index à des caractère il doit continuer à itérer dessus 
        i++ permet d'ajouter +1 tant que la string est lu à l'index crée au dédut de la paranthèse
    */
    for ($i = 0; isset($haystack[$i]); $i++) {

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

echo "La lettre $needle dans la string $haystack est utilisé $result fois."
    ?>