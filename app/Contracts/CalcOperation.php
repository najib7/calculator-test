<?php

namespace App\Contracts;

interface CalcOperation
{
    public function calculate(int|float $firstNumber, int|float $secondNumber): int|float;
}
