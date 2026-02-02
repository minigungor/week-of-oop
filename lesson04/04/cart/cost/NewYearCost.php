<?php

namespace lesson04\example2\demo09\cart\cost;

class NewYearCost implements CalculatorInterface
{
    private $next;
    private $percent;
    private $month;

    public function __construct(CalculatorInterface $next, $month, $percent)
    {
        $this->next = $next;
        $this->month = $month;
        $this->percent = $percent;
    }

    public function getCost(array $items)
    {
        $cost = $this->next->getCost($items);
        if($this->month === 12){
            return (1 - $this->percent / 100) * $cost;
        } else {
            return $cost;
        }
    }
}