<?php
function my_array_sort(array $arrayToSort, string $ord): array
{
    if ($ord !== "ASC" && $ord !== "DESC" && $ord) {
        return [];
    }

    $lengh = 0;
    foreach ($arrayToSort as $element) {
        $lengh++;
    }

    for ($i = 0; $i < $lengh - 1; $i++) {
        $index = $i;
        for ($compareTheLastElementofI = $i + 1; $compareTheLastElementofI < $lengh; $compareTheLastElementofI++) {
            if ($ord === "ASC" && $arrayToSort[$compareTheLastElementofI] < $arrayToSort[$index]) {
                $index = $compareTheLastElementofI;
            } elseif ($ord === "DESC" && $arrayToSort[$compareTheLastElementofI] > $arrayToSort[$index]) {
                $index = $compareTheLastElementofI;
            }
        }

        $temporaireStokage = $arrayToSort[$index];
        $arrayToSort[$index] = $arrayToSort[$i];
        $arrayToSort[$i] = $temporaireStokage;
    }

    return $arrayToSort;
}

$result1 = my_array_sort([2486, 152, 654, 531], "ASC");
$result2 = my_array_sort([2486, 152, 654, 531], "DESC");
var_dump($result1);
var_dump($result2);