@props(['back'])
<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css"  rel="stylesheet" />
{{--    @vite('resources/js/app.js')--}}
</head>
<body class="h-full">
<div class="h-full flex flex-col flex-nowrap">
    <header class="bg-white shadow flex-none w-full">
        <div class="px-4 py-6 sm:px-6 lg:px-8 bg-slate-900 flex justify-between content-center items-center">
            <h1 class="text-3xl font-bold tracking-tight text-white">Exploratory testing tool</h1>
            @if(isset($back))
                <a href="{{$back}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-[48px] h-[48px] text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                    </svg>
                    BACK
                </a>
            @else
                <a class="invisible text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-[48px] h-[48px] text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                    </svg>
                    BACK
                </a>
            @endif
        </div>
    </header>
    <main class="grow overflow-hidden">
        <div class="h-full w-full mx-auto px-4 py-6 sm:px-6 lg:px-8 flex flex-row bg-gray-100 overflow-hidden">
            <div class="basis-1/2 pr-12 border-r border-gray-300" >{{$slot}}</div>
            <div class="basis-1/2 pl-12 overflow-x-hidden overflow-auto">{{$list ?? ''}}</div>
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>

