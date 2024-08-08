<x-layout-1 back="/tests">
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button class="rounded-md hover:text-white border-2 hover:bg-blue-800  border-indigo-600 px-3 py-2 text-sm font-semibold shadow-sm focus-visible:outline
                focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Start recording
        </button>
        <button
            data-modal-target="modal"
            data-modal-toggle="modal"
            class="block hover:text-white rounded-md border-2 border-indigo-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button"
        >
            Create bugreport
        </button>
    </div>
    <form method="POST" action="/tests/{{$test->id}}">
        @csrf
        @method('PATCH')
        <div class="space-y-12 mt-8">
            <div class="border-b border-t pt-8 border-gray-900/10 pb-12">
                <div class="col-span-full">
                    <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Charter</label>
                    <div class="mt-2">
                            <textarea id="charter" name="charter" rows="3"
                                      class="max-h-80 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm
                                      ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                      focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$test->charter}}</textarea>
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Change the text if necessary.</p>
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
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                    Reset
                </button>
                <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500
                    focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Edit
                </button>
            </div>
        </div>
    </form>
    <form action="/tests/{{$test->id}}}" id="delete" method="POST">
        @csrf
        @method('DELETE')
    </form>
    <x-slot:list>
        <ul role="list" class="divide-y divide-gray-100 h-full">
            @foreach($test->bugreports as $bug)
                <li class="gap-x-6 py-5 bg-gray-200">
                    <a href="/bugreports/{{$bug->id}}" class="flex justify-between">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="mt-1 max-w-2xl truncate text-sm leading-6 text-gray-900 pl-4">{{$bug->title}}</p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm leading-6 text-gray-600 pr-4">{{$bug->created_at}}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </x-slot:list>
</x-layout-1>

<div id="modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    New bugreport
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="create-bugreport" action="/bugreports" method="POST">
                @csrf
                <div class="p-4 md:p-5 space-y-4">
                    <div class="sm:col-span-6 mb-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <x-text-input field="title"></x-text-input>
                    </div>
                    <div class="sm:col-span-6 mb-4">
                        <label for="environment"
                               class="block text-sm font-medium leading-6 text-gray-900">Environment</label>
                        <x-text-input field="environment"></x-text-input>
                    </div>
                    <div class="sm:col-span-6 mb-4">
                        <label for="users" class="block text-sm font-medium leading-6 text-gray-900">Users</label>
                        <x-text-input field="users"></x-text-input>
                    </div>
                    <input type="hidden" name="test" value="{{$test->id}}">
                </div>
            </form>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button form="create-bugreport" data-modal-hide="modal" type="submit"
                        class="text-white bg-indigo-600 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-600 dark:focus:ring-indigo-600">
                    Create
                </button>
                <button data-modal-hide="modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Decline
                </button>
            </div>

        </div>
    </div>
</div>
