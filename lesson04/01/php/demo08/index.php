<?php

use demo08\graphics\Canvas;
use demo08\points\Point;

require_once __DIR__ . '/vendor/autoload.php';

$canvas = new Canvas();
$point = new Point(4,5,6);

echo $canvas->paint($point);

echo get_class($canvas) . PHP_EOL;
echo get_class($point) . PHP_EOL;
