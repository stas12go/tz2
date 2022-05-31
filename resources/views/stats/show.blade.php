<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{--TODO Здесь будет статистика--}}
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-white border-b">
                                        <tr>
                                            <th id="ordinalNumber" scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left cursor-pointer whitespace-nowrap table-sort-rows">
                                                #
                                            </th>
                                            <th id="ID" scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left cursor-pointer whitespace-nowrap table-sort-rows">
                                                ID
                                            </th>
                                            <th id="IP" scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left cursor-pointer whitespace-nowrap table-sort-rows">
                                                IP
                                            </th>
                                            <th id="visitPeriod" scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left cursor-pointer whitespace-nowrap table-sort-rows">
                                                Период пребывания на странице
                                            </th>
                                            <th id="visitInterval" scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left cursor-pointer whitespace-nowrap table-sort-rows">
                                                Время пребывания на странице
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($stats as $key => $item)
                                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $key + 1 }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $item->user_id }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $item->user_IP }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $item->visited_at }} - {{ $item->left_at }}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $item->time_interval }}
                                                </td>
                                            </tr>
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
    @endPush
</x-app-layout>
