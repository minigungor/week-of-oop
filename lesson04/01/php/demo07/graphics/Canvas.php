<?php

namespace demo07\graphics;

class Canvas
{
    public function paint(Point $point)
    {
        list($x, $y, $z) = $point->getPointCoordinates();
        return "['x' => $x, 'y' => $y, 'z' => $z]\n";
    }

}