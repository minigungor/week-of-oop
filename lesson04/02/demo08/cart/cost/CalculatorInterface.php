<?php

namespace lesson04\example2\demo08\cart\cost;

interface CalculatorInterface
{
    public function getCost(array $items);
}