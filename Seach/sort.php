<?php
include 'bubleSort.php';
include 'shakerSort.php';
include 'basicSorting.php';
include 'splminheap.php';

function newArray()
{
    $mincount = 0;
    $maxcount = 30000;
    $count = 30000;

    for ($i = 1; $i <= $count; $i++) {
        $array[] = rand($mincount, $maxcount);
    }
    return $array;
}
$arr = newArray();

$start = microtime(true);
bubbleSort($arr);
echo 'Время выполнения скрипта сортировка пузырьком: '.round(microtime(true) - $start, 4).' сек.' . PHP_EOL;

$start = microtime(true);
shakerSort($arr);
echo 'Время выполнения скрипта сортирова шейкер: '.round(microtime(true) - $start, 4).' сек.' . PHP_EOL;

$start = microtime(true);
basicSorting($arr);
echo 'Время выполнения скрипта базовая функция php: '.round(microtime(true) - $start, 4).' сек.' . PHP_EOL;

$start = microtime(true);
pyramidSort($arr);
echo 'Время выполнения скрипта spl: '.round(microtime(true) - $start, 4).' сек.' . PHP_EOL;