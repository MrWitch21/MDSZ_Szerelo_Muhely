<x-nav-layout>
    <x-slot name="main">
        <div class="relative w-full mt-14 relative p-2 sm:p-1">
            <button type="button"
                class="w-full flex items-center justify-center w-1/2 px-6 py-3 text-base text-white transition-colors rounded-lg gap-x-2 sm:w-auto hover:bg-gray-700">
                <a href="{{ url('/worksheet') }}">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                        </svg>
                        <span class="ml-2 font-bold text-xl">Vissza</span>
                    </div>
                </a>
            </button>
        </div>
        <div class="relative w-full">
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">

                <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                        Adatok
                    </h3>
                </div>
                <form action="/worksheet/{{ $worksheet->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="owner_name">Tulajdonos neve</label>
                            <input type="text" id="owner_name" name="owner_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->owner_name }}" {{ $isMechanic ? 'disabled' : '' }}>
                            @error('owner_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="owner_address">Tulajdonos címe</label>
                            <input type="text" id="owner_address" name="owner_address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->owner_address }}" {{ $isMechanic ? 'disabled' : '' }}>
                            @error('owner_address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="license_plate">Rendszám</label>
                            <input type="text" id="license_plate" name="license_plate"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->license_plate }}" {{ $isMechanic ? 'disabled' : '' }}>
                            @error('license_plate')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="make">Márka</label>
                            <input type="text" id="make" name="make"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->make }}" {{ $isMechanic ? 'disabled' : '' }}>
                            @error('make')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="model">Modell</label>
                            <input type="text" id="model" name="model"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->model }}" {{ $isMechanic ? 'disabled' : '' }}>
                            @error('model')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="mechanic_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Szerelő</label>
                            <select id="mechanic_id" name="mechanic_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                {{ $isMechanic ? 'disabled' : '' }}>
                                @foreach ($mechanics as $mechanic)
                                    <option value="{{ $mechanic->id }}" @selected($worksheet->users->pluck('id')->contains($mechanic->id))>
                                        {{ $mechanic->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('mechanic_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="receptionist_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="receptionist_id">Létrehozó</label>
                            <input type="text" id="receptionist_id" name="receptionist_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->users()->wherePivot('access_role', 'receptionist')->first()->name }}"
                                disabled>
                        </div>
                        <div class="flex justify-end" style="align-items: flex-end;">
                            <button type="submit"
                                class="bg-blue-500 text-white font-semibold h-10 px-4 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 ease-in-out"
                                {{ $isMechanic ? 'disabled' : '' }}>Frissítés</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="relative w-full mt-14">
            <div>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
                    <div class="flex justify-between items-center pb-6 pt-2 pl-4 pr-4 rounded-t dark:border-gray-600">
                        <h3 class="text-4xl font-semibold text-gray-900 dark:text-white">
                            Alkatrészek
                        </h3>
                        <div class="pr-8">
                            <a href="{{ route('worksheet.components_add', ['worksheet' => $worksheet]) }}">
                                <button type="submit"
                                    class="bg-blue-500 text-white font-semibold h-10 px-4 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 ease-in-out">
                                    Új hozzáadás
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-base text-gray-700 uppercase bg-blue-200 dark:bg-gray-800 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4 text-center">Név</th>
                                    <th scope="col" class="p-4 text-center">Ár/db</th>
                                    <th scope="col" class="p-4 text-center">Db</th>
                                    <th scope="col" class="p-4 text-center">Összesen</th>
                                    <th scope="col" class="p-4 text-center">Művelet</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($worksheet->listOfComponents() as $component)
                                    <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ $component->name }}</td>
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ $component->price }} Ft</td>
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ $component->quantity }} db</td>
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ $component->total }} Ft</td>
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            <div class="flex items-center justify-center">
                                                <a href="{{ route('worksheet.components_edit', ['worksheet' => $worksheet, 'component_worksheetid' => $component->id]) }}"
                                                    class="inline-flex items-center">
                                                    <button type="submit"
                                                        class="bg-blue-500 text-white font-semibold h-10 px-4 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 ease-in-out flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2"
                                                            viewBox="0 0 20 20" fill="currentColor"
                                                            aria-hidden="true">
                                                            <path
                                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                            <path fill-rule="evenodd"
                                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        Módosítás
                                                    </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="relative w-full mt-14">
            <div>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
                    <div class="flex justify-between items-center pb-6 pt-2 pl-4 pr-4 rounded-t dark:border-gray-600">
                        <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                            Anyagok
                        </h3>
                        <div class="pr-8">
                            <a href="{{ route('worksheet.materials_add', ['worksheet' => $worksheet]) }}">
                                <button type="submit"
                                    class="bg-blue-500 text-white font-semibold h-10 px-4 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 ease-in-out">
                                    Új hozzáadás
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-base text-gray-700 uppercase bg-blue-200 dark:bg-gray-800 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4 text-center">Név</th>
                                    <th scope="col" class="p-4 text-center">Ár/db</th>
                                    <th scope="col" class="p-4 text-center">Db</th>
                                    <th scope="col" class="p-4 text-center">Összesen</th>
                                    <th scope="col" class="p-4 text-center">Művelet</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($worksheet->listOfMaterials() as $material)
                                    <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ $material->name }}</td>
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ $material->price }} Ft</td>
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ $material->quantity }} db</td>
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ $material->total }} Ft</td>
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            <div class="flex items-center justify-center">
                                                <a href="{{ route('worksheet.materials_edit', ['worksheet' => $worksheet, 'material_worksheetid' => $material->id]) }}"
                                                    class="inline-flex items-center">
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
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="relative w-full mt-14">
            <div>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
                    <div class="flex justify-between items-center pb-6 pt-2 pl-4 pr-4 rounded-t dark:border-gray-600">
                        <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                            Szolgáltatások
                        </h3>
                        <div class="pr-8">
                            <a href="{{ route('worksheet.work_processes_add', ['worksheet' => $worksheet]) }}">
                                <button type="submit"
                                    class="bg-blue-500 text-white font-semibold h-10 px-4 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 ease-in-out">
                                    Új hozzáadás
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-base text-gray-700 uppercase bg-blue-200 dark:bg-gray-800 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4 text-center">Név</th>
                                    <th scope="col" class="p-4 text-center">Ár/óra</th>
                                    <th scope="col" class="p-4 text-center">Perc</th>
                                    <th scope="col" class="p-4 text-center">Összesen</th>
                                    <th scope="col" class="p-4 text-center">Művelet</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($worksheet->listOfWorkProcesses() as $work_process)
                                    <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ $work_process->name }}</td>
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ $work_process->price }} Ft</td>
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ $work_process->duration }}</td>
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ $work_process->total }} Ft</td>
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            <div class="flex items-center justify-center">
                                                <a href="{{ route('worksheet.work_processes_edit', ['worksheet' => $worksheet, 'work_process_worksheetid' => $work_process->id]) }}"
                                                    class="inline-flex items-center">
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
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-nav-layout>
<style>
    input:disabled {
        background-color: #4a5568;
        color: #718096;
    }


    button:disabled {
        background-color: #4a5568;
        color: #718096;
    }

    button:disabled:hover {
        background-color: #4a5568;
        color: #718096;
    }
</style>
