<?php
function my_reverse_string(string $chaine): string
{
    $chaineInverse = '';
    $longueur = 0;

    for ($i = 0; isset($chaine[$i]); $i++) {
        $longueur++;
    }

    for ($i = $longueur - 1; $i >= 0; $i--) {
        $chaineInverse .= $chaine[$i];
    }

    return $chaineInverse;
}

$chaineInverse = my_reverse_string('boum');
echo "Avant renversement : boum.<br>Après renversement : $chaineInverse.";