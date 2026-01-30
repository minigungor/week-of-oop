<?php

namespace lesson03\example5\demo05;


class Canvas
{
    public function paint($x, $y, $z)
    {
        return "['x' => $x, 'y' => $y, 'z' => $z]\n";
    }

    public function line($x1, $y1, $z1, $x2, $y2, $z2)
    {
        return "['x1' => $x1, 'y1' => $y1, 'z1' => $z1] - ['x2' => $x2, 'y2' => $y2, 'z2' => $z2]\n";
    }
}

$canvas = new Canvas();

$x = 5;
$y = 7;
$z = -2;

echo $canvas->paint($x, $y, $z);