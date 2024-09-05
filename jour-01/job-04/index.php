<?php
function my_fizz_buzz(int $lenght): array
{
    $number = [];
    for ($i = 0; $i <= $lenght; $i++)
        if ($i % 5 === 0 && $i % 3 === 0) {
            $number[] = "FizzBuzz";
        } elseif ($i % 5 === 0) {
            $number[] = "Buzz";
        } elseif ($i % 3 === 0) {
            $number[] = "Fizz";
        } else {
            $number[] = $i;
        }
    return $number;
}

$result = my_fizz_buzz(15);
print_r($result);
var_dump($result);