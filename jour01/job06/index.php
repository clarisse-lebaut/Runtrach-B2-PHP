<h1>JOB 6 : Trier un tableau</h1>

<?php
function my_array_sort(array $arrayToSort, string $ord): array
{
    // Vérifier la correction de l'ordre des éléments dans la liste
    if ($ord !== "ASC" && $ord !== "DESC" && $ord) {
        return []; // Tableau vide si l'ordre n'est pas valide
    }

    // Calcul de la longeur du tableau
    $lengh = 0;
    foreach ($arrayToSort as $element) {
        $lengh++;
    }

    // Tri par sélection
    for ($i = 0; $i < $lengh - 1; $i++) {
        $index = $i;
        for ($compareTheLastElementofI = $i + 1; $compareTheLastElementofI < $lengh; $compareTheLastElementofI++) {
            if ($ord === "ASC" && $arrayToSort[$compareTheLastElementofI] < $arrayToSort[$index]) {
                $index = $compareTheLastElementofI; // Trouve le minimum pour ASC
            } elseif ($ord === "DESC" && $arrayToSort[$compareTheLastElementofI] > $arrayToSort[$index]) {
                $index = $compareTheLastElementofI; // Trouve le maximum pour DESC
            }
        }

        // ?Échanger les éléments trouvés
        //*on stock la valeur à echanger
        $temporaireStokage = $arrayToSort[$index];
        //*on échange les éléments, on déplace l'élément i à a place du min ou de max qui a été trouvé par $compareThe
        $arrayToSort[$index] = $arrayToSort[$i];
        //*placer le min ou le max à la bonne position en fonction du mode de trie choisis
        $arrayToSort[$i] = $temporaireStokage;
    }

    return $arrayToSort;
}

$result1 = my_array_sort([2486, 152, 654, 531], "ASC");
$result2 = my_array_sort([2486, 152, 654, 531], "DESC");
var_dump($result1);
var_dump($result2);
?>