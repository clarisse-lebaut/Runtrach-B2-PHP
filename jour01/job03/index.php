<?php
function my_is_multiple(int $divider, int $multiple): bool
{
    if ($divider % $multiple === 0) {
        return true;
    } else {
        return false;
    }
}

var_dump(my_is_multiple(10, 2));
$yes = my_is_multiple(10, 2);
echo $yes;

var_dump(my_is_multiple(10, 3));
$no = my_is_multiple(10, 3);
echo $no;