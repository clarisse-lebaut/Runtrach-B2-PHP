<h1>JOB 3 : Multiples et diviseurs</h1>

<?php
function my_is_multiple(int $divider, int $multiple): bool
{
    if ($divider % $multiple === 0) {
        return true;
    } else {
        return false;
    }
}

$yes = my_is_multiple(10, 2);
echo $yes; //true apparait sous la forme de 1
echo '<br>';
$no = my_is_multiple(10, 3);
echo $no; // rien n'apprait à l'écran car le false est considérer comme nul

var_dump(my_is_multiple(10, 2));
var_dump(my_is_multiple(10, 3));
?>