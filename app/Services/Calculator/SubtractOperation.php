<?php

namespace App\Services\Calculator;

use App\Contracts\CalcOperation;

class SubtractOperation implements CalcOperation
{
    public function calculate(float|int $firstNumber, float|int $secondNumber): int|float
    {
        return $firstNumber - $secondNumber;
    }
}
