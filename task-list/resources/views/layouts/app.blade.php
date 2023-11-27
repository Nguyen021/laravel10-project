<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 task list</title>
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn{
            @apply rounded px-3 py-2 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-100 text-slate-700;
        }
        .link{
            @apply text-gray-700 font-bold decoration-sky-500 underline hover:decoration-indigo-500/30 hover:text-gray-500;
        }
        label {
            @apply block uppercase text-slate-700 mb-2
        }
        input, textarea {
            @apply shadow-sm border appearance-none w-full py-2 px-3 text-slate-700 leading-tight focus:outline-blue-500/50;
        }
        .error{
            @apply   font-medium tracking-wide text-red-500 text-xs ;
        }
    </style>
    {{-- blade-formatter-enable --}}
    @yield('styles')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h5 class="mb-4 text-2xl">
        @yield('header')
    </h5>
    <div>
        @if(session('success'))
            {{ session('success') }}
        @endif
        @if(session()->has('success'))
            {{ session('success') }}
        @endif
    </div>
    <div>
        @yield('content')
    </div>
</body>
</html>
