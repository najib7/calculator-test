<?php

namespace App\Services\Calculator;

use App\Contracts\CalcOperation;
use App\Exceptions\DivideByZeroException;

class ModulusOperation implements CalcOperation
{
    /**
     * @throws DivideByZeroException
     */
    public function calculate(float|int $firstNumber, float|int $secondNumber): int|float
    {
        if ($secondNumber === 0) {
            throw new DivideByZeroException;
        }

        return $firstNumber % $secondNumber;
    }
}
