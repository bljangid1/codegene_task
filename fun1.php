<?php

function distributeMoney($x, $y, $z) {
    $remainingMoney = $x;
    $distribution = [];

    for ($i = 1; $i <= $y; $i++) {


        $amount = min($z, $remainingMoney);

        $distribution[$i] = $amount;

        $remainingMoney -= $amount;

        if ($remainingMoney <= 0) {
            $remainingMoney = 0;
            break;
        }
    }

    for ($j = $i + 1; $j <= $y; $j++) {
        $distribution[$j] = 0;
    }

    echo "Distribution:<br>";
    foreach ($distribution as $person => $amount) {
        echo "Person $person gets: Rs. $amount<br>";
    }

    echo "\nRemaining Money: Rs. $remainingMoney<br>";

    return $remainingMoney;
}


$x = 500; 
$y = 4;  
$z = 150;

distributeMoney($x, $y, $z);

?>