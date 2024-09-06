<h1>JOB 4 : Fizz, Buzz et FizzBuzz</h1>

<?php
function my_fizz_buzz(int $lenght): array
{
    // création d'une variable dont sa valeur est un tableau vide
    $number = [];
    /*
        indexation d'un valeur à 0, et tant que la le nombre n'est === au pramètre lenght dans la focntion
        et le i++ est toujours là pour arrêter l'incrémentation
     */
    for ($i = 0; $i <= $lenght; $i++)
        // suite des conditions, toujours les même avec les restes des divisions
        // toujours mettre celle qui necessite plusieurs règles en haut
        if ($i % 5 === 0 && $i % 3 === 0) {
            $number[] = "FizzBuzz";
        } elseif ($i % 5 === 0) {
            $number[] = "Buzz";
        } elseif ($i % 3 === 0) {
            $number[] = "Fizz";
        } else {
            //ne pas pas oublier de faire appraitre le reste de la liste de nombre
            $number[] = $i;
        }
    // stockage de la nouvelle valeur de cette variable
    return $number;
}

// création d'une variable dans laquelle on indique la valeur de la fonction
$result = my_fizz_buzz(15);
//*TODO : RAPPEL - les arrays ne se print pas avec un echo, il faut print_r ou var_dump
print_r($result);
var_dump($result);

// my_fizz_buzz(15)
?>