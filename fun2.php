<?php

function getAmountBeforeTax($x) {
    $taxRate = 0.29;

    // reverse calculation
    $y = $x / (1 + $taxRate);

    return $y;
}

// Example usage:
$x = 1290; // amount including 29% tax
$original = getAmountBeforeTax($x);

echo "Amount before tax: Rs. " . round($original, 2);

?>