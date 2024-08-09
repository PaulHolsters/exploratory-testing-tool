<x-layout-1 back="/tests/{{$bug->test_id}}">
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button
            data-modal-target="modal"
            data-modal-toggle="modal"
            class="block hover:text-white rounded-md border-2 border-indigo-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button"
        >
            Add step
        </button>
    </div>
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
    <x-slot:list>
        <ul role="list" class="divide-y divide-gray-100 h-full">
            @php
            $steps = [];
            foreach ($bug->steps as $step){
                $steps[$step->rang-1] = $step;
            }
            ksort($steps);
            @endphp
            @foreach($steps as $step)
                <li class="gap-x-6 py-5 bg-gray-200 flex justify-between items-center">
                    <div class="flex">
                        <div class="">
                            <p style="width: max-content" class="text-sm text-gray-600 pr-4">step {{$step->rang}}</p>
                        </div>
                        <div class="">
                            <p class="text-sm text-gray-900 pl-4">{{$step->step}}</p>
                        </div>
                    </div>
                    <div class="flex">
                        @if($step->rang>1)
                            <form action="/teststeps/{{$step->id}}/down" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v13m0-13 4 4m-4-4-4 4"/>
                                    </svg>
                                    <span class="sr-only">Up one step</span>
                                </button>
                            </form>
                        @else
                            <button type="submit" class="invisible text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v13m0-13 4 4m-4-4-4 4"/>
                                </svg>
                                <span class="sr-only">Up one step</span>
                            </button>
                        @endif
                        @if($step->rang<sizeof($steps))
                            <form action="/teststeps/{{$step->id}}/up" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19V5m0 14-4-4m4 4 4-4"/>
                                    </svg>
                                    <span class="sr-only">Down one step</span>
                                </button>
                            </form>
                        @else
                                <button type="submit" class="invisible text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19V5m0 14-4-4m4 4 4-4"/>
                                    </svg>
                                    <span class="sr-only">Down one step</span>
                                </button>
                        @endif
                        <form action="/teststeps/{{$step->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                </svg>
                                <span class="sr-only">Delete test step</span>
                            </button>
                        </form>
                    </div>
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
            <form id="create-step" action="/teststeps" method="POST">
                @csrf
                <div class="p-4 md:p-5 space-y-4">
                    <div class="sm:col-span-6 mb-4">
                        <label for="step" class="block text-sm font-medium leading-6 text-gray-900">Step</label>
                        <x-text-input field="step"></x-text-input>
                    </div>
                    <input type="hidden" name="bug" value="{{$bug->id}}">
                </div>
            </form>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button form="create-step" data-modal-hide="modal" type="submit"
                        class="text-white bg-indigo-600 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-600 dark:focus:ring-indigo-600">
                    Create
                </button>
                <button data-modal-hide="modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Cancel
                </button>
            </div>

        </div>
    </div>
</div>
