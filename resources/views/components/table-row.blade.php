<tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
        {{ $key }}
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
