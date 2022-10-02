<?php

function pyramidSort($arr)
{
    $tree = new SplMinHeap();

    foreach($arr as $n) {
        $tree->insert($n);
    }

    $arr = [];
    while($tree->valid()) {
        $arr[] = $tree->top();
        $tree->next();
    }
    return $arr;

}