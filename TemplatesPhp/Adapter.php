<?php

class SquareAreaLib
{
    public function getSquareArea(int $diagonal)
    {
        $area = ($diagonal**2)/2;

        return $area;
    }
}

class CircleAreaLib
{
    public function getCircleArea(int $diagonal)
    {
        $area = (M_PI * $diagonal**2)/4;

        return $area;
    }
}

interface FigureAdapter
{
    function getFigure(int $diagonal);
}

class SquareAreaLibAdapter implements FigureAdapter
{
    protected $object;

    public function __construct() {
        $this->object = new SquareAreaLib();
    }
    public function getFigure(int $diagonal) {
        return $this->object->getSquareArea($diagonal);
    }
}

class CircleAreaLibAdapter implements FigureAdapter
{
    protected $object;

    public function __construct() {
        $this->object = new CircleAreaLib();
    }
    public function getFigure(int $diagonal) {
        return $this->object->getCircleArea($diagonal);
    }
}

$adapter1 = new SquareAreaLibAdapter();
$adapter2 = new CircleAreaLibAdapter();

function getFigure(FigureAdapter $adapter) 
{
    echo $adapter->getFigure(10) . PHP_EOL;
}

getFigure($adapter1);
getFigure($adapter2);
