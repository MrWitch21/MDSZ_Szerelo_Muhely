<x-nav-layout>
    <x-slot name="slot">
        <div class="relative w-full mt-14">
            <div>
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
                    <div class="flex justify-between items-center pb-6 pt-2 pl-4 pr-4 rounded-t dark:border-gray-600">
                        <h3 class="text-4xl font-semibold text-gray-900 dark:text-white">
                            Anyagok
                        </h3>
                        <div class="pr-8">
                            <a href="material/create">
                            <button type="button" class="py-2 px-4 flex items-center text-base font-semibold text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition duration-300 ease-in-out"
                                style="background-color: #4F46E5;">
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
                                    <th scope="col" class="p-4 text-center">Művelet</th>
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
                                        <td
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex items-center justify-center">
                                                <a href="/material/{{$material->id}}/edit">
                                                <button type="button"
                                                    class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                                    style="background-color: #4F46E5;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
                    <div class="p-4">
                        {{ $materials->links() }}
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-nav-layout>
