<?php

namespace App\Http\Requests;

use App\Enums\CalculatorOperatorEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CalculatorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_number' => ['required', 'numeric'],
            'second_number' => ['required', 'numeric'],
            'operator' => ['required', Rule::enum(CalculatorOperatorEnum::class)]
        ];
    }
}
