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
echo $yes;
echo '<br>';
$no = my_is_multiple(10, 3);
echo $no;

var_dump(my_is_multiple(10, 2));
var_dump(my_is_multiple(10, 3));