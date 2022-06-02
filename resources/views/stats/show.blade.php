<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{--TODO Здесь будет статистика--}}
                    <div class="flex justify-center">
                        <div>Показать записи:</div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mx-2 cursor-pointer" type="radio" name="filterBy" id="filterByLastHour" value="lastHour">
                            <label class="form-check-label inline-block text-gray-800" for="filterByLastHour">за последний час</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mx-2 cursor-pointer" type="radio" name="filterBy" id="filterByLastDay" value="lastDay">
                            <label class="form-check-label inline-block text-gray-800" for="filterByLastDay">за последние сутки</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mx-2 cursor-pointer" type="radio" name="filterBy" id="filterByLastWeek" value="lastWeek">
                            <label class="form-check-label inline-block text-gray-800" for="filterByLastWeek">за последнюю неделю</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mx-2 cursor-pointer" type="radio" name="filterBy" id="filterByLastMonth" value="lastMonth">
                            <label class="form-check-label inline-block text-gray-800" for="filterByLastMonth">за последний месяц</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mx-2 cursor-pointer" type="radio" name="filterBy" id="filterByAllTime" value="allTime" checked>
                            <label class="form-check-label inline-block text-gray-800" for="filterByAllTime">за всё время</label>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-white border-b">
                                        <tr>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left cursor-pointer whitespace-nowrap table-sort-rows">
                                                #
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left cursor-pointer whitespace-nowrap table-sort-rows">
                                                ID
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left cursor-pointer whitespace-nowrap table-sort-rows">
                                                IP
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left cursor-pointer whitespace-nowrap table-sort-rows">
                                                Период пребывания на странице
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left cursor-pointer whitespace-nowrap table-sort-rows">
                                                Время пребывания на странице
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($stats as $key => $item)
                                           <x-table-row :key="$key + 1" :item="$item" />
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script defer src="{{ asset('js/table-sort-rows.js') }}"></script>
        <script defer src="{{ asset('js/table-filter-rows.js') }}"></script>
    @endPush
</x-app-layout>
