const tableHeads = document.querySelectorAll('.table-sort-rows');
let element;
let sortAsc = true;
for (let index = 0; index < tableHeads.length; index++) {
    element = tableHeads[index];
    element.addEventListener('click', function (event) {
        const tableHead = event.target;
        const table = tableHead.closest('table');
        let columnIndex;

        for (const [index, element] of tableHeads.entries()) {
            if (element === event.target) {
                columnIndex = index;
            }
        }

        let tableRows = Array.from(table.querySelectorAll('tr'));
        tableRows = tableRows.slice(1, tableRows.length);
        const tableRowsLength = tableRows.length;
        let sortedTableRows = tableRows.slice();

        sortedTableRows.sort(function (a, b) {
            const aText = a.children[columnIndex].innerText;
            const bText = b.children[columnIndex].innerText;
            let result;

            if (aText > bText) result = 1;
            else if (aText < bText) result = -1
            else if (aText === bText) result = 0;

            return sortAsc ? result : result * -1;
        });

        table.querySelector('tbody').innerHTML = '';
        for (let index = 0; index < tableRowsLength; index++) {
            console.log('index', index);
            console.log(sortedTableRows);
            console.log(sortedTableRows[index]);
            table.querySelector('tbody').append(sortedTableRows[index]);
        }

        sortAsc = !sortAsc;
    });
}
