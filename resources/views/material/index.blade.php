<x-nav-layout>
    <x-slot name="main">
        <div class="relative w-full mt-14">
            <div>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
                    <div class="flex justify-between items-center pb-6 pt-2 pl-4 pr-4 rounded-t dark:border-gray-600">
                        <h3 class="text-4xl font-semibold text-gray-900 dark:text-white">
                            Anyagok
                        </h3>
                        <div class="pr-8">
                            <a href="material/create">
                                <button type="submit"
                                    class="bg-blue-500 text-white font-semibold h-10 px-4 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 ease-in-out flex items-center">
                                    Új anyag
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
                                    <th scope="col" class="p-4 text-center">Ár</th>
                                    <th scope="col" class="p-4 text-center">Létrehozva</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materials as $material)
                                    <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ $material->name }}</td>
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ $material->price }} Ft</td>
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                            {{ $material->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4">
                        {{ $materials->links() }}
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-nav-layout>
