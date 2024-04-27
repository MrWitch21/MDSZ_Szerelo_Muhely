<x-nav-layout>
    <x-slot name="main">
    </x-slot>
</x-nav-layout>
<div class="relative ml-64 w-4/5 mt-14 relative p-2 bg-white sm:p-1 bg-transparent">
    <a href="{{ url()->previous() }}">
        <button type="button"
            class="w-full flex items-center justify-center w-1/2 px-6 py-3 text-base text-white transition-colors bg-transparent rounded-lg gap-x-2 sm:w-auto hover:bg-gray-700">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
            </svg>

            <span class="font-bold text-xl">Vissza</span>
        </button>
    </a>
</div>
<div class="relative w-4/5 mt-14 p-2 mx-auto max-w-md sm:p-4">
    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
            <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                Hozzáadott szolgáltatás szerkesztése
            </h3>
        </div>
        <form action="/worksheet/{{ $worksheet->id }}/{{ $work_process->id }}/work_process/update" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Szolgáltatás neve</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{ $work_process_name }}" required="" disabled>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anyag mennyisége</label>
                    <input type="number" name="duration" id="duration"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{ $work_process->duration }}" min="1" required>
                    @error('duration')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Frissítés</button>
            </div>
        </form>
        <form action="/worksheet/{{ $worksheet->id }}/{{ $work_process->id }}/work_process/destroy" method="post" class="mt-[-36px]">
            @csrf
            @method('delete')
            <div class="flex justify-start">
                <button type="submit"
                    class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                    style="background-color: #ff0000;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z"
                            clip-rule="evenodd" />
                    </svg>
                    Törlés
                </button>
            </div>
        </form>
    </div>
</div>
