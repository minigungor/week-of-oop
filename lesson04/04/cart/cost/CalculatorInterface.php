<?php

namespace lesson04\example4\cart\cost;

interface CalculatorInterface
{
    public function getCost(array $items);
}