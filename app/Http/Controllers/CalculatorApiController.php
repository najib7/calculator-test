<?php

namespace App\Http\Controllers;

use App\Contracts\CalcOperation;
use App\Enums\CalculatorOperatorEnum;
use App\Http\Requests\CalculatorRequest;
use Illuminate\Http\JsonResponse;

class CalculatorApiController extends Controller
{
    public function store(CalculatorRequest $request): JsonResponse
    {
        $operator = CalculatorOperatorEnum::from($request->input('operator'));

        /** @var CalcOperation $calculator */
        $calculator = app(CalcOperation::class, [$operator]);

        $result = $calculator->calculate(
            $request->input('first_number'),
            $request->input('second_number')
        );

        return response()->json([
            'result' => $result
        ]);
    }
}
