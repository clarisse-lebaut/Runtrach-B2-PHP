<?php
function my_closest_to_zero(array $numbers): int
{
    $closest = $numbers[0];

    foreach ($numbers as $number) {
        if (($number > 0 && $closest <= 0) || ($number <= 0 && $closest > 0)) {
            $closest = $number;
        } elseif (($number >= 0 && $closest >= 0) || ($number <= 0 && $closest <= 0)) {
            if ($number < $closest) {
                $closest = $number;
            }
        }
    }

    return $closest;
}
$numbers = [5, -3, 7, -1, 2];
$result = my_closest_to_zero($numbers);
echo "Le nombre le plus proche de zéro rest $result.";