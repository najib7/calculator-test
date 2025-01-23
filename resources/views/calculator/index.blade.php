@extends('layouts.base')

@section('content')
    <div class="flex justify-center items-center ">
        <div class="p-4 border border-solid shadow-white border-white-400 bg-black rounded-xl">
            <p id="output-screen" class="mb-5 p-5 font-extrabold rounded-xl text-white bg-black text-right"></p>

            <div class="grid grid-cols-4 gap-4">
                <button class="rounded-full border-solid border-gray-500 bg-slate-300 p-4" onclick="clearNumber()">C</button>
                <button class="rounded-full border-solid border-gray-500 bg-slate-300 p-4" onclick="resetNumbers()">Del</button>
                <button class="rounded-full border-solid border-gray-500 bg-slate-300 p-4" onclick="selectOperator(OPERATIONS.modulus)">%</button>
                <button class="rounded-full text-white border-solid border-gray-500 bg-amber-500 p-4" onclick="selectOperator(OPERATIONS.divide)">/</button>
                <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white p-2" onclick="addNumber('7')">7</button>
                <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white p-2" onclick="addNumber('8')">8</button>
                <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white p-2" onclick="addNumber('9')">9</button>
                <button class="rounded-full text-white border-solid border-gray-500 bg-amber-500 p-4" onclick="selectOperator(OPERATIONS.multiply)">*</button>
                <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white p-2" onclick="addNumber('4')">4</button>
                <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white p-2" onclick="addNumber('5')">5</button>
                <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white p-2" onclick="addNumber('6')">6</button>
                <button class="rounded-full text-white border-solid border-gray-500 bg-amber-500 p-4" onclick="selectOperator(OPERATIONS.subtract)">-</button>
                <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white p-2" onclick="addNumber('1')">1</button>
                <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white p-2" onclick="addNumber('2')">2</button>
                <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white p-2" onclick="addNumber('3')">3</button>
                <button class="rounded-full text-white border-solid border-gray-500 bg-amber-500 p-4" onclick="selectOperator(OPERATIONS.addition)">+</button>
                <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white p-4 col-span-2" onclick="addNumber('0')">0</button>
                <button class="rounded-full border-solid border-gray-500 bg-gray-500 text-white p-4" onclick="addNumber('.')">.</button>
                <button class="rounded-full border-solid border-gray-500 bg-amber-500 text-white p-4" onclick="calculate()">=</button>
            </div>
        </div>
    </div>

@endsection

@push('head')
    <script>
        const form = {
            firstNumber: '',
            secondNumber: '',
            operator: null
        }

        const OPERATIONS = {
            addition: 'addition',
            multiply: 'multiply',
            subtract: 'subtract',
            divide: 'divide',
            modulus: 'modulus',
        }

        function addNumber(number) {
            const current = getCurrentDisplayedNumber()
            form[current] = form[current].concat(number)

            displayNumber(form[current])
        }

        function getCurrentDisplayedNumber() {
            return !form.operator ? 'firstNumber' : 'secondNumber'
        }

        function displayNumber(number) {
            document.querySelector('#output-screen').innerText = number
        }

        function selectOperator(operator) {
            form.operator = operator
        }

        function resetNumbers() {
            form.firstNumber = ''
            form.secondNumber = ''
            form.operator = null

            displayNumber(null)
        }

        function clearNumber() {
            const current = getCurrentDisplayedNumber()
            form[current] = form[current].slice(0, -1)

            displayNumber(form[current])
        }

        async function calculate() {
            const { data } = await axios.post('/api/calculator', {
                first_number: form.firstNumber * 1,
                second_number: form.secondNumber * 1,
                operator: form.operator,
            })

            form.firstNumber = data.result.toString()
            form.secondNumber = ''
            form.operator = null

            displayNumber(data.result)
        }
    </script>
@endpush
