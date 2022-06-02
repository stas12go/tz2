const radioButtons = document.querySelectorAll("input[name='filterBy']");
let element;

for (let index = 0; index < radioButtons.length; index++) {
    element = radioButtons[index];
    element.addEventListener('change', function () {
        fetch('/getFilteredStats?filterBy=' + this.value, {
            method: 'GET'
        }).then((response) => {
            return response.json();
        }).then((data) => {
            if (data === 'error') {
                alert('Произошла ошибка!');
            } else {
                const tableBody = document.querySelector('tbody');
                tableBody.innerHTML = '';

                for (const [key, value] of data.entries()) {
                    const tableRow = document.createElement('tr');
                    let tableData;

                    tableRow.classList.add('bg-white', 'border-b', 'transition', 'duration-300', 'ease-in-out', 'hover:bg-gray-100');
                    tableBody.appendChild(tableRow);

                    tableData = document.createElement('td');
                    tableData.classList.add('px-6', 'py-4', 'whitespace-nowrap', 'text-sm', 'font-medium', 'text-gray-900');
                    tableData.innerText = key + 1;
                    tableRow.appendChild(tableData);

                    tableData = document.createElement('td');
                    tableData.classList.add('text-sm', 'text-gray-900', 'font-light', 'px-6', 'py-4', 'whitespace-nowrap');
                    tableData.innerText = value.user_id;
                    tableRow.appendChild(tableData);

                    tableData = document.createElement('td');
                    tableData.classList.add('text-sm', 'text-gray-900', 'font-light', 'px-6', 'py-4', 'whitespace-nowrap');
                    tableData.innerText = value.user_IP;
                    tableRow.appendChild(tableData);

                    tableData = document.createElement('td');
                    tableData.classList.add('text-sm', 'text-gray-900', 'font-light', 'px-6', 'py-4', 'whitespace-nowrap');
                    tableData.innerText = value.visited_at + ' - ' + value.left_at;
                    tableRow.appendChild(tableData);

                    tableData = document.createElement('td');
                    tableData.classList.add('text-sm', 'text-gray-900', 'font-light', 'px-6', 'py-4', 'whitespace-nowrap');
                    tableData.innerText = value.time_interval;
                    tableRow.appendChild(tableData);

                }
            }
        });
    });
}
