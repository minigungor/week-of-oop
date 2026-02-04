<?php

namespace lesson05\php\demo02\example03\index02;

function openCsv($fileName)
{
    $file = fopen($fileName, 'r');
    while(!feof($file)) {
        yield explode(';', fgetcsv($file)[0]);
    }
    fclose($file);
}

foreach (openCsv(__DIR__ . '/list.csv') as $row) {
    print_r($row);
}