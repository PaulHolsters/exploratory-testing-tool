<x-layout-1>
    {{--    @if($errors->any())
            <div class="mt-10">
            <ul>
            @foreach($errors->all() as $error)
                <li class="text-red-500">{{$error}}</li>
            @endforeach
            </ul>
            </div>
        @endif--}}
    <form method="POST" action="/tests">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">New test</h2>
                <div class="col-span-full">
                    <label for="charter" class="block text-sm font-medium leading-6 text-gray-900">Charter</label>
                    <div class="mt-2">
                            <textarea
                                required
                                minlength="3"
                                id="charter"
                                name="charter"
                                rows="3"
                                class="max-h-80 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                    @error('charter')
                    <div class="mt-1"><i class="text-red-500">{{$message}}</i></div>
                    @enderror
                    <p class="mt-3 text-sm leading-6 text-gray-600">Fill in your test charter.</p>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900" onclick="window.clear()">Clear</button>
            <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Create
            </button>
        </div>
    </form>
    <x-slot:list>
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
    </x-slot:list>
</x-layout-1>

