<x-nav-layout>
    <x-slot name="main">
        <div class="relative w-full mt-14">
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                        Új munkalap
                    </h3>
                </div>
                <form action="/worksheet" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="owner_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tulajdonos
                                neve</label>
                            <input type="text" name="owner_name" id="owner_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Tulajdonos neve" required="">
                            @error('owner_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="owner_address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tulajdonos
                                címe</label>
                            <input type="text" name="owner_address" id="owner_address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Tulajdonos címe" required="">
                            @error('owner_address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="license_plate"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rendszám</label>
                            <input type="text" name="license_plate" id="license_plate"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Jármű rendszáma" required="">
                            @error('license_plate')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="make"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Márka</label>
                            <input type="text" name="make" id="make"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Jármű márkája" required="">
                            @error('make')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="model"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modell</label>
                            <input type="text" name="model" id="model"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Jármű modell" required="">
                            @error('model')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="mechanic_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Szerelő</label>
                            <select id="mechanic_id" name="mechanic_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @foreach ($mechanics as $mechanic)
                                    <option value="{{ $mechanic->id }}">{{ $mechanic->name }}</option>
                                @endforeach
                            </select>
                            @error('mechanic_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Létrehozás</button>
                    </div>
                </form>
            </div>
        </div>

    </x-slot>
</x-nav-layout>
