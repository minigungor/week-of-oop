<?php

namespace lesson03\example5\demo12;

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

    public function line(Point $from, Point $to)
    {
        list($x1, $y1, $z1) = $from->getPointCoordinates();
        list($x2, $y2, $z2) = $to->getPointCoordinates();

        return "['x1' => $x1, 'y1' => $y1, 'z1' => $z1] - ['x2' => $x2, 'y2' => $y2, 'z2' => $z2]\n";
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

class CilindricalPoint implements Point
{
    private $f;
    private $r;
    private $h;

    public function __construct($f, $r, $h)
    {
        $this->f = $f;
        $this->r = $r;
        $this->h = $h;
    }

    public function getPointCoordinates() {
        return [
            $this->r * cos($this->f),
            $this->r * sin($this->f),
            $this->h,
        ];
    }
}

class SphericalPoint implements Point
{
    public $r;
    public $t;
    public $f;

    public function __construct($r, $t, $f)
    {
        $this->r = $r;
        $this->t = $t;
        $this->f = $f;
    }

    public function getPointCoordinates()
    {
        return [
            $this->r * cos($this->f) * sin($this->t),
            $this->r * sin($this->f) * cos($this->t),
            $this->r * cos($this->t),
        ];
    }
}



##########

$canvas = new Canvas();

$point = new DecartPoint(5, 7, -2);

echo $canvas->paint($point);

$point = new CilindricalPoint(5, 7, -2);

echo $canvas->paint($point);

$point = new SphericalPoint(5, 7, -2);

echo $canvas->paint($point);

echo $canvas->line(new DecartPoint(5, 23, 17), new SphericalPoint(7, 5, 4.2));