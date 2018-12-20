<?php

$n = $argv[1];
$randomNumberArray=array();
for ($i = 0; $i < $n; $i++) {
    $randomNumber = rand();
    array_push($randomNumberArray, $randomNumber);
}
echo "Atsitiktiniu skaiciu masyvas: ";
var_dump($randomNumberArray);
echo "\n";

for ($j = 0; $j< $n-1; $j++) {
    $minKey = $j;
    for ($k = $j+1; $k < $n; $k++) {
        if ($randomNumberArray[$k] < $randomNumberArray[$minKey]) {
            $minKey = $k;
        }
    }
    if ($minKey != $j) {
        $tempValue = $randomNumberArray[$j];
        $randomNumberArray[$j] = $randomNumberArray[$minKey];
        $randomNumberArray[$minKey] = $tempValue;
    }
}

echo " Surikiuotas masyvas: " ;
var_dump($randomNumberArray);
