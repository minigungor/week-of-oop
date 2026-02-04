<?php

namespace lesson05\php\demo01\example02\index05;

use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use FileSystemIterator;
use DirectoryIterator;

$dir = dirname(dirname(__DIR__));

$iterator = new DirectoryIterator($dir);

foreach ($iterator as $item) {
    echo $item->isDir() ? 'Dir: ' : 'File: ';
    echo $item->getFileName() . PHP_EOL;
}

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($dir, FileSystemIterator::SKIP_DOTS)
);

foreach ($iterator as $item) {
    echo $item->isDir() ? 'Dir: ' : 'File: ';
    echo $item->getFileName() . PHP_EOL;
}