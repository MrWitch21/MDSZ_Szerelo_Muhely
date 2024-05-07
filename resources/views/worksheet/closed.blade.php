<x-nav-layout>
    <x-slot name="main">
        <div class="relative w-full mt-14">
            <div>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex justify-between items-center pb-4 rounded-t  border-b dark:border-gray-600 p-4">
                        <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                            Lezárt munkalapok
                        </h3>
                        <div class="w-full md:w-2/4">
                            <form class="flex items-center justify-end">
                                <div class="relative mr-4">
                                    <label for="search_select" class="sr-only">Keresés mező</label>
                                    <select id="search_select" name="search_select"
                                        class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-3 pr-6 rounded-lg shadow-sm text-sm focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:ring-gray-600 dark:focus:border-gray-600">
                                        <option value="owner_name" @selected(old('search_select',  request()->input('search_select')) == "owner_name")>Tulajdonos neve</option>
                                        <option value="owner_address" @selected(old('search_select',  request()->input('search_select')) == "owner_address")>Tulajdonos címe</option>
                                        <option value="license_plate" @selected(old('search_select',  request()->input('search_select')) == "license_plate")>Rendszám</option>
                                        <option value="make" @selected(old('search_select',  request()->input('search_select')) == "make")>Márka</option>
                                        <option value="model" @selected(old('search_select',  request()->input('search_select')) == "model")>Modell</option>
                                        <option value="created_at" @selected(old('search_select',  request()->input('search_select')) == "created_at")>Létrehozva</option>
                                    </select>
                                </div>
                                @include('shared.search-bar')
                            </form>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-sm text-gray-700 uppercase bg-blue-200 dark:bg-gray-800 dark:text-gray-400">
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
                                                    <a href="{{ route('worksheet.closed.show', ['worksheet' => $worksheet]) }}" class="inline-flex items-center">
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
