<?php

namespace App\Enums;

enum CalculatorOperatorEnum: string
{
    case Addition = 'addition';

    case Multiply = 'multiply';

    case Subtract = 'subtract';

    case Divide = 'divide';

    case Modulus = 'modulus';
}
