<h1>JOB 5 : les nombres premiers</h1>

<?php
function my_is_prime(int $number): bool
{
    // si les nombres sont inférieur ou égale à un === pas nombre premier
    if ($number <= 1) {
        return false;
    }
    // ici on fait une opération
    /*
        *on vérifie si il y a un diviseur en plus de 1 et de $number
        index commence à partir du chiffre 2, est inférieur ou égale à 4, c'est pas un nombre premier
        dans la condition --> si $number divisé par $i === 0, c'est qu'il y a un autre diviseur
        donc c'est pas un nombre premier
    */
    for ($i = 2; $i * $i <= $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    // sinon c'est que c'est bon !
    return true;
}

$yes = my_is_prime(5);
$no = my_is_prime(4);
// condition ternanire dans echo pour avoir le mot booléen écrit
echo $yes ? 'true' : 'false';
echo '<br>';
echo $no ? 'true' : 'false';
;
?>