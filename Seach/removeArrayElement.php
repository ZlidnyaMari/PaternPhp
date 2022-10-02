<?php

$arr = [1, 8, 20, 30 ,30 ,8, 20, 1];

function removeElem($arr)
{
    $value = 20; //тскомое значение 
    $keys[] = array_keys($arr, $value); // получаем массив ключей по запрошеным значениям [0=>2 1=>6]

    $valueKey = 6; //например выбираем что нам нужно удалить именно значение под ключом 6
    unset($arr[$valueKey]); //удаляем 
    return $arr;
}

print_r(removeElem($arr));