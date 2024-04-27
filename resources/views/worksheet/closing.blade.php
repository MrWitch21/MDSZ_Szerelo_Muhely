<x-nav-layout>
    <x-slot name="main">
        <div class="relative w-full mt-14 relative p-2 bg-white sm:p-1 bg-transparent">
            <a href="{{ url('/worksheet') }}">
                <button type="button" class="w-full flex items-center justify-center w-1/2 px-6 py-3 text-base text-white transition-colors bg-transparent rounded-lg gap-x-2 sm:w-auto hover:bg-gray-700">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                      </svg>

                      <span class="font-bold text-xl">Vissza</span>
                </button>
            </a>
        </div>
        <h3 class="text-5xl font-semibold text-gray-900 dark:text-white">
            Munkalap lezárása
        </h3>


        <div class="relative w-full mt-10">
            <div>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
                    <div class="flex justify-between items-center pb-6 pt-2 pl-4 pr-4 rounded-t dark:border-gray-600">
                        <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
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
                <form action="/worksheet/{{ $worksheet->id }}/edit/close" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="total">Végösszeg</label>
                        <div>
                            <input type="text" id="total" name="total"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $worksheet->getTotalValue() }} Ft" readonly>

                        </div>
                        @error('total')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="payment_method">Fizetési mód</label>
                        <select id="payment_method" name="payment_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="cash">Készpénz</option>
                            <option value="card">Kártya</option>
                        </select>
                        @error('payment_method')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div></div>
                    <div class="flex justify-end" style="align-items: flex-end;">
                        <button type="submit"
                            class="bg-blue-500 text-white font-semibold h-10 px-4 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 ease-in-out">Lezárás</button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-nav-layout>
