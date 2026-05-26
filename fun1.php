<?php

function distributeMoney($x, $y, $z) {
    $remainingMoney = $x;
    $distribution = [];

    // loop through each person
    for ($i = 1; $i <= $y; $i++) {

        // each person gets minimum of:
        // remaining money, max limit z
        $amount = min($z, $remainingMoney);

        $distribution[$i] = $amount;

        $remainingMoney -= $amount;

        // if no money left, break early
        if ($remainingMoney <= 0) {
            $remainingMoney = 0;
            break;
        }
    }

    // if people are left, they get 0
    for ($j = $i + 1; $j <= $y; $j++) {
        $distribution[$j] = 0;
    }

    // display result
    echo "Distribution:\n";
    foreach ($distribution as $person => $amount) {
        echo "Person $person gets: Rs. $amount\n";
    }

    echo "\nRemaining Money: Rs. $remainingMoney\n";

    // return remaining money
    return $remainingMoney;
}


// Example usage:
$x = 500; // total money
$y = 4;   // number of people
$z = 150; // max per person

distributeMoney($x, $y, $z);

?>