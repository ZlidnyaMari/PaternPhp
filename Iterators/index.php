<?php
$n = 100;
$array[]= [];
$count = 0;

    for ($i = 0; $i < $n; $i++) {
        for ($j = 1; $j < $n; $j *= 2) {
            ++$count;
            $array[$i][$j]= true;
    } 
}
echo $count;
//print_r($array);
