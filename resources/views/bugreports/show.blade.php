<x-layout-1 back="/tests/{{$bug->test_id}}">
    <form method="POST" action="/bugreports/{{$bug->id}}">
        @csrf
        @method('PATCH')
        <div>
            <div class="border-b border-gray-900/10 pb-12 spacer-y-4">
                <h2 class="text-base font-semibold leading-7 text-gray-900 mb-4">Bugreport</h2>
                <div class="sm:col-span-6 mb-4">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <x-text-input field="title">{{$bug->title}}</x-text-input>
                </div>
                <div class="sm:col-span-6 mb-4">
                    <label for="environment" class="block text-sm font-medium leading-6 text-gray-900">Environment</label>
                    <x-text-input field="environment">{{$bug->environment}}</x-text-input>
                </div>
                <div class="sm:col-span-6 mb-4">
                    <label for="users" class="block text-sm font-medium leading-6 text-gray-900">Users</label>
                    <x-text-input field="users">{{$bug->users}}</x-text-input>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-between gap-x-6">
            <button type="submit"
                    form="delete"
                    class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500
                    focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Delete
            </button>
            <div class="space-x-6 flex items-center">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900" onclick="location.reload()">Reset</button>
                <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Edit
                </button>
            </div>
        </div>
    </form>
    <form action="/bugreports/{{$bug->id}}}" id="delete" method="POST">
        @csrf
        @method('DELETE')
    </form>
{{--    <x-slot:list>
        <ul role="list" class="divide-y divide-gray-100 h-full">
            @foreach($tests as $test)
                <li class="gap-x-6 py-5 bg-gray-200">
                    <a href="/tests/{{$test->id}}" class="flex justify-between">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="mt-1 max-w-2xl truncate text-sm leading-6 text-gray-900 pl-4">{{$test->charter}}</p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm leading-6 text-gray-600 pr-4">{{$test->date}}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </x-slot:list>--}}
</x-layout-1>
