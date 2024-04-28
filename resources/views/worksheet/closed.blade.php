<x-nav-layout>
    <x-slot name="main">
        <div class="relative w-full mt-14">
            <div>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex justify-between items-center pb-4 rounded-t  dark:border-gray-600 p-4">
                        <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                            Lezárt munkalapok
                        </h3>
                    </div>
                    <div
                        class="flex flex-col md:flex-row items-center justify-end md:space-x-3 space-y-3 md:space-y-0 mx-4 py-4 border-t dark:border-gray-700">
                        <div class="flex-grow"></div>
                        <div>
                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                class="py-2 px-4 flex items-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    class="h-4 w-4 mr-1.5 -ml-1 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                        clip-rule="evenodd" />
                                </svg>
                                Szűrési beállítások
                                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-blue-200 dark:bg-gray-800 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4 text-center">Szerelő</th>
                                    <th scope="col" class="p-4 text-center">Tulajdonos neve</th>
                                    <th scope="col" class="p-4 text-center">Tulajdonos címe</th>
                                    <th scope="col" class="p-4 text-center">Rendszám</th>
                                    <th scope="col" class="p-4 text-center">Márka</th>
                                    <th scope="col" class="p-4 text-center">Modell</th>
                                    <th scope="col" class="p-4 text-center">Lezárva</th>
                                    <th scope="col" class="p-4 text-center">Művelet</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($worksheets as $worksheet)
                                    @if ($worksheet->closed)
                                        <tr
                                            class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                                {{ $worksheet->users()->wherePivot('access_role', 'mechanic')->first()->name }}
                                            </td>
                                            <td
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                                {{ $worksheet->owner_name }}</td>
                                            <td
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                                                {{ $worksheet->owner_address }}</td>
                                            <td
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                                {{ $worksheet->license_plate }}</td>
                                            <td
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                                {{ $worksheet->make }}</td>
                                            <td
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                                {{ $worksheet->model }}</td>
                                            <td
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                                {{ $worksheet->closed_at }}</td>
                                            <td
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex items-center justify-center">
                                                    <a href="{{ route('worksheet.closed.show', $worksheet->id) }}" class="inline-flex items-center">
                                                        <button type="button"
                                                            class="py-2 px-3 mr-6 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                                fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1.38 8.28a.87.87 0 0 1 0-.566 7.003 7.003 0 0 1 13.238.006.87.87 0 0 1 0 .566A7.003 7.003 0 0 1 1.379 8.28ZM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            Megtekintés
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4">
                        {{ $worksheets->links() }}
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-nav-layout>
