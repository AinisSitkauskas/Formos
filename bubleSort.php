<?php

$n = $argv[1];
$randomNumberArray=array();
$j = 0;
for ($i = 0; $i < $n; $i++) {
    $randomNumber = rand();
    array_push($randomNumberArray, $randomNumber);
}
echo "Atsitiktiniu skaiciu masyvas: ";
var_dump($randomNumberArray);
echo "\n";
while ($j< $n) {
    $minKey = $j;
    for ($k = 1; $k < $n-$j; $k++) {
        if ($randomNumberArray[$k] < $randomNumberArray[$k-1]) {
            $tempValue = $randomNumberArray[$k];
            $randomNumberArray[$k] = $randomNumberArray[$k-1];
            $randomNumberArray[$k-1] = $tempValue;
        }
    }
    $j++;
}
echo " Surikiuotas masyvas: " ;
var_dump($randomNumberArray);
