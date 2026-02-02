<?php

namespace lesson04\example2\demo09\cart\cost;

interface CalculatorInterface
{
    public function getCost(array $items);
}