<?php

interface Point
{
    public function getPointCoordinates();
}

class Canvas
{
    public function paint(Point $point)
    {
        list($x, $y, $z) = $point->getPointCoordinates();
        return "['x' => $x, 'y' => $y, 'z' => $z]\n";
    }

}


class DecartPoint implements Point
{
    private $x;
    private $y;
    private $z;

    public function __construct($x, $y, $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    public function getPointCoordinates()
    {
        return [$this->x, $this->y, $this->z];
    }
}


##########

$canvas = new Canvas();

$point = new DecartPoint(5, 7, -2);

echo $canvas->paint($point);

echo get_class($canvas) . PHP_EOL;
echo get_class($point) . PHP_EOL;