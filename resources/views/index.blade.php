<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Laravel</title>
</head>

<body>
    <section class="text-gray-600 body-font">
        <form action="{{ route('currency') }}" method="POST">
            @csrf
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-12">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Currency Converter</h1>
                </div>
                <div
                    class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">
                    <div class="relative flex-grow w-full">
                        <div class="relative flex-grow w-full">
                            <label class="text-left">
                            </label>
                            <select name="from"
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-transparent focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-3 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                @foreach ($names as $name => $value)
                                    <option {{ $name == @session('from') ||  
                                    $name == 'USD' ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="relative flex-grow w-full">
                        <label class="text-left">
                        </label>
                        <select name="to"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-transparent focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-3 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @foreach ($names as $name => $value)
                                <option {{ $name == @session('to') || 
                                $name == 'MMK' ? 'selected' : '' }}>
                                  {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative flex-grow w-full">
                        <input type="text" id="amount" name="amount" placeholder="Amount" value="{{ @session('amount') }}" 
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-red-500 focus:bg-transparent focus:ring-2 focus:ring-red-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <button
                        class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Convert</button>
                </div>
            </div>
        </form> 
        @if (session('conversion'))
        <div class="flex flex-col text-center w-full">
          <h4 class="lg:w-2/3 mx-auto leading-relaxed text-2xl font-medium">{{ session('conversion') }}</h4>
        </div>
        @elseif ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="flex flex-col text-center w-full">
          <p class="lg:w-2/3 mx-auto leading-relaxed text-2xl text-red-400 font-medium">{{ $error }}</p>
        </div>
        @endforeach
        @endif
    </section>
</body> 
</html>
