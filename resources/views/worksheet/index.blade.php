<x-nav-layout>
    <x-slot name="main">
        <div class="relative w-full mt-14">
            <div>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex justify-between items-center pb-4 rounded-t border-b dark:border-gray-600 p-4">
                        <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                            Folyamatban lévő munkalapok
                        </h3>
                        <div class="w-full md:w-1/4">
                            <form class="flex items-center">
                                <label for="search" class="sr-only">Keresés</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" id="search"
                                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Keresés" required="">
                                </div>
                                <div class="flex justify-end" style="align-items: flex-end;">
                                    <button type="submit"
                                        class="ml-4 bg-blue-500 text-white font-semibold h-10 px-4 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 ease-in-out">
                                        Keresés</button>
                                </div>
                            </form>
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
                                    <th scope="col" class="p-4 text-center">Létrehozva</th>
                                    <th scope="col" class="p-4 text-center">Műveletek</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($worksheets as $worksheet)
                                    @if (!$worksheet->closed)
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
                                                {{ $worksheet->created_at }}</td>
                                            <td
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex items-center justify-center">
                                                    <a href="{{ route('worksheet.show', $worksheet->id) }}" class="inline-flex items-center">
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
                                                    <a href="{{ route('worksheet.edit', $worksheet->id) }}" class="inline-flex items-center">
                                                        <button type="submit"
                                                        class="bg-blue-500 text-white font-semibold h-10 px-4 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 ease-in-out flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-4 w-4 mr-2 -ml-0.5" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true">
                                                            <path
                                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                            <path fill-rule="evenodd"
                                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        Módosítás
                                                    </button>
                                                    </a>
                                                    <span class="mx-4"></span>
                                                    <a href="{{ route('worksheet.closing', $worksheet->id) }}" class="inline-flex items-center">
                                                        <button type="submit"
                                                        class="bg-lime-600 text-white font-semibold h-10 px-4 rounded-lg shadow-md hover:bg-lime-400 focus:outline-none focus:ring-2 focus:ring-lime-500 focus:ring-offset-2 transition duration-300 ease-in-out flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 mr-1 -ml-0.5">
                                                            <path fill-rule="evenodd" d="M8 1a3.5 3.5 0 0 0-3.5 3.5V7A1.5 1.5 0 0 0 3 8.5v5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5v-5A1.5 1.5 0 0 0 11.5 7V4.5A3.5 3.5 0 0 0 8 1Zm2 6V4.5a2 2 0 1 0-4 0V7h4Z" clip-rule="evenodd" />
                                                          </svg>
                                                        Lezárás
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
