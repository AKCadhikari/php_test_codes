<?php

function apple($num_apples,$price){

    
    $total=$num_apples*$price;
    return $total;
}

$num_apples= 5;
$price= 100;
$total= (apple($num_apples,$price));
echo"the total value of apple: $total rs,";

?>