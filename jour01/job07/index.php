<h1>JOB 7 : trouver le plus près de 0</h1>

<?php
function my_closest_to_zero(array $numbers): int
{
    // Initialisation de la variable pour le nombre le plus proche de zéro
    // Mettre le 0 dans un tableau permet de faire un index
    $closest = $numbers[0];

    foreach ($numbers as $number) {
        // Utilisation de la différence pour déterminer la proximité à zéro
        if (($number > 0 && $closest <= 0) || ($number <= 0 && $closest > 0)) {
            // Le nombre positif est plus proche de zéro ou le nombre négatif est plus proche de zéro
            $closest = $number;
        } elseif (($number >= 0 && $closest >= 0) || ($number <= 0 && $closest <= 0)) {
            // Les deux nombres ont le même signe (ou zéro), comparer leur distance à zéro
            if ($number < $closest) {
                $closest = $number;
            }
        }
    }

    return $closest;
}
$numbers = [5, -3, 7, -1, 2];
$result = my_closest_to_zero($numbers);
echo "Le nombre le plus proche de zéro rest $result."
?>