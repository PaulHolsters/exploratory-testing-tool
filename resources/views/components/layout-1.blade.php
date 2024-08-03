<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
<div class="h-full flex flex-col flex-nowrap">
    <header class="bg-white shadow flex-none w-full">
        <div class="px-4 py-6 sm:px-6 lg:px-8 bg-slate-900">
            <h1 class="text-3xl font-bold tracking-tight text-white">Exploratory testing tool</h1>
        </div>
    </header>
    <main class="grow overflow-hidden">
        <div class="h-full w-full mx-auto px-4 py-6 sm:px-6 lg:px-8 flex flex-row bg-gray-100 overflow-hidden">
            <div class="basis-1/2 pr-12 border-r border-gray-300" >{{$slot}}</div>
            <div class="basis-1/2 pl-12 overflow-y-scroll overflow-hidden">{{$list}}</div>
        </div>
    </main>
</div>
</body>
</html>

