<?php

namespace App\Services\Calculator;

use App\Contracts\CalcOperation;

class MultiplyOperation implements CalcOperation
{
    public function calculate(float|int $firstNumber, float|int $secondNumber): int|float
    {
        return $firstNumber * $secondNumber;
    }
}
