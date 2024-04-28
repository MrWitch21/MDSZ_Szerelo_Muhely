<style>
    @media print {

        .no-print,
        .no-print * {
            display: none !important;
        }
    }
</style>
<script>
    function printDiv() {
        var printContents = document.getElementById('printableArea').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
<x-nav-layout>
    <x-slot name="main">
        <div class="relative w-full mt-14 relative p-2 sm:p-1 bg-transparent">
            <button type="button"
                class="w-full flex items-center justify-center w-1/2 px-6 py-3 text-base text-white transition-colors rounded-lg gap-x-2 sm:w-auto hover:bg-gray-700">
                <a href="{{ url('/worksheet/closed') }}">
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
        <div id="printableArea">
            <div class="relative w-full">
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                            Lezárt munkalap
                        </h3>
                        <button onclick="printDiv();" id="print"
                            class="no-print bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="w-4 h-4 mr-2">
                                    <path fill-rule="evenodd"
                                        d="M4 5a2 2 0 0 0-2 2v3a2 2 0 0 0 1.51 1.94l-.315 1.896A1 1 0 0 0 4.18 15h7.639a1 1 0 0 0 .986-1.164l-.316-1.897A2 2 0 0 0 14 10V7a2 2 0 0 0-2-2V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v3Zm1.5 0V2.5h5V5h-5Zm5.23 5.5H5.27l-.5 3h6.459l-.5-3Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Nyomtatás
                            </div>
                        </button>

                    </div>
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tulajdonos
                                neve</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->owner_name }}" disabled>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tulajdonos
                                címe</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->owner_address }}" disabled>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rendszám</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->license_plate }}" readonly>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Márka</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->make }}" readonly>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modell</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->model }}" readonly>
                        </div>
                        <div></div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Létrehozás
                                időpontja</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->created_at }}" readonly>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lezárás
                                időpontja</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->closed_at }}" readonly>
                        </div>
                        <div>
                            <label for="mechanic_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Szerelő</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->users()->wherePivot('access_role', 'mechanic')->first()->name }}"
                                readonly>
                        </div>
                        <div>
                            <label for="receptionist_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Létrehozó</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->users()->wherePivot('access_role', 'receptionist')->first()->name }}"
                                readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative w-full mt-14">
                <div>
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
                        <div
                            class="flex justify-between items-center pb-6 pt-2 pl-4 pr-4 rounded-t dark:border-gray-600">
                            <h3 class="text-4xl font-semibold text-gray-900 dark:text-white">
                                Alkatrészek
                            </h3>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($worksheet->listOfComponents() as $component)
                                        <tr
                                            class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
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
                        <div
                            class="flex justify-between items-center pb-6 pt-2 pl-4 pr-4 rounded-t dark:border-gray-600">
                            <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                                Anyagok
                            </h3>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($worksheet->listOfMaterials() as $material)
                                        <tr
                                            class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
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
                        <div
                            class="flex justify-between items-center pb-6 pt-2 pl-4 pr-4 rounded-t dark:border-gray-600">
                            <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                                Szolgáltatások
                            </h3>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($worksheet->listOfWorkProcesses() as $work_process)
                                        <tr
                                            class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative w-full mt-14">
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="payment_method">Fizetési mód</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->payment_method === 'cash' ? 'Készpénz' : 'Kártya' }}" readonly>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="total">Végösszeg</label>
                            <div>
                                <input type="text" id="total" name="total"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ $worksheet->total }} Ft" readonly>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-nav-layout>
