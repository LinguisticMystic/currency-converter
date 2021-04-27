@extends('layout')
@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{$error}}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
            </div>
        @endforeach
    @endif

    <div class="float-right mx-5 my-5">
        <a href src="/currencies-import" title="Refresh rates">
            <img class="float-right mx-5 my-5" src="/img/refresh.png" width="30px">
        </a>
    </div>

    <div class="flex justify-center">

        <div class="flex flex-col">
            <img src="/img/logo.png">

            <div class="flex">

                <div class="flex flex-2">
                    <form action="/exchange" method="post">
                        <select
                            class="block w-full pl-3 pr-10 py-2 text-black placeholder-gray-400 transition duration-100 ease-in-out bg-white border border-gray-300 rounded shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:ring-opacity-50 disabled:opacity-50 disabled:cursor-not-allowed"
                            name="symbol">

                            @foreach($symbols->all() as $symbol)
                                <option value="{{ $symbol }}">{{ $flags[$symbol] }} {{ $symbol }}</option>
                            @endforeach
                        </select>
                </div>

                <div class="flex flex-1">
                    <input
                        class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-full"
                        type="number" step="0.01" name="amount" placeholder="0" value="{{ old('amount') }}">
                </div>
            </div>

            <input class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded mt-2"
                   type="submit" value="Exchange">
            </form>

            <div class="flex justify-center mt-10">

                @if (!empty($currencyInfo))
                    <p class="text-3xl">{{ $flags['EUR'] }} EUR {{ $currencyInfo[1] }}
                        = {{ $flags[$currencyInfo[0]] }} {{ $currencyInfo[0] }}
                        {{ number_format($currencyInfo[1] * ($currencyInfo[2] / 100000), 2) }}
                    </p>
                @endif

            </div>

        </div>

    </div>

@endsection
