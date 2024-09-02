<?php
function my_is_prime(int $number): bool
{
    if ($number <= 1) {
        return false;
    }

    for ($i = 2; $i * $i <= $number; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

$yes = my_is_prime(5);
$no = my_is_prime(4);

echo $yes ? 'true' : 'false';
echo '<br>';
echo $no ? 'true' : 'false';