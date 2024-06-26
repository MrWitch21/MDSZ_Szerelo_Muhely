<x-nav-layout>
    <x-slot name="main">
    </x-slot>
</x-nav-layout>
<div class="relative ml-64 w-4/5 mt-14 relative p-2 sm:p-1 bg-transparent">
    <button type="button"
        class="w-full flex items-center justify-center w-1/2 px-6 py-3 text-base text-white transition-colors rounded-lg gap-x-2 sm:w-auto hover:bg-gray-700">
        <a href="{{ redirect()->back()->getTargetUrl() }}">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                </svg>
                <span class="ml-2 font-bold text-xl">Vissza</span>
            </div>
        </a>
    </button>
</div>
<div class="relative w-4/5 mt-14 p-2 mx-auto max-w-md sm:p-4">
    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
            <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                Szolgáltatás hozzáadása
            </h3>
        </div>
        <form action="/worksheet/{{ $worksheet->id }}/work_process/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="work_process_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anyag</label>
                    <select id="work_process_id" name="work_process_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @foreach ($work_processes as $work_process)
                            <option value="{{ $work_process->id }}">
                                {{ $work_process->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('work_process_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Időtartam -percben-</label>
                    <input type="number" name="duration" id="duration"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="1" min="1" max="4000" required>
                    @error('duration')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Hozzáadás
                </button>
            </div>
        </form>
