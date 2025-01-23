<?php

namespace App\Providers;

use App\Contracts\CalcOperation;
use App\Enums\CalculatorOperatorEnum;
use App\Services\Calculator\AdditionOperation;
use App\Services\Calculator\DivideOperation;
use App\Services\Calculator\ModulusOperation;
use App\Services\Calculator\MultiplyOperation;
use App\Services\Calculator\SubtractOperation;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app()->bind(CalcOperation::class, function (Application $app, array $params) {
            /** @var CalculatorOperatorEnum $operator */
            $operator = $params[0];

            $class = match ($operator) {
                CalculatorOperatorEnum::Addition => AdditionOperation::class,
                CalculatorOperatorEnum::Multiply => MultiplyOperation::class,
                CalculatorOperatorEnum::Subtract => SubtractOperation::class,
                CalculatorOperatorEnum::Divide => DivideOperation::class,
                CalculatorOperatorEnum::Modulus => ModulusOperation::class,
            };

            return new $class();
        });
    }
}
