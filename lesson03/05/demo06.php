<?php

namespace lesson03\example5\demo06;


class Canvas
{
    public function paint(Point $point)
    {
        $x = $point->x;
        $y = $point->y;
        $z = $point->z;

        return "['x' => $x, 'y' => $y, 'z' => $z]\n";
    }

    public function line(Point $from, Point $to)
    {
        $x1 = $from->x;
        $y1 = $from->y;
        $z1 = $from->z;

        $x2 = $to->x;
        $y2 = $to->y;
        $z2 = $to->z;

        return "['x1' => $x1, 'y1' => $y1, 'z1' => $z1] - ['x2' => $x2, 'y2' => $y2, 'z2' => $z2]\n";
    }
}

class Point
{
    public $x;
    public $y;
    public $z;
}


##########

$canvas = new Canvas();

$point = new Point();

$point->x = 5;
$point->y = 7;
$point->z = -2;

echo $canvas->paint($point);