<?php

namespace graphics {
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
}

namespace points
{
    class DecartPoint implements \graphics\Point
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
}

##########
namespace {
    $canvas = new \graphics\Canvas();
    $point = new \points\DecartPoint(5, 7, -2);
    echo get_class($point) . PHP_EOL;
    echo $canvas->paint($point);
    echo get_class($canvas) . PHP_EOL;
}




