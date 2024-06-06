const usersListTableField = document.getElementById('users-list-table');
var activeId = 0;

async function getUsersListTable(){
    const response = await fetch('/get/users/list/table')
    const data = await response.json();
    return data['users_list'];
}

getUsersListTable().then((data) => {
    console.log(data);
    new gridjs.Grid({
        columns: ['Barangay', 'Username', 'Password', 
            {
                name: 'Action',
                formatter: (_, row) => gridjs.html(`<a href="/patients/dashboard?user=${row.cells[0].data}" class="text-color">Visit</a>`)
            }
        ],
        search: {
            selector: (cell, rowIndex, cellIndex) => {
                if (cellIndex === 1) return cell;
            }
        },
        data: data,
        style: {
            table: {
              border: '3px solid #ccc'
            },
            th: {
              'background-color': 'rgba(0, 0, 0, 0.1)',
              color: '#000',
              'border-bottom': '3px solid #ccc',
              'text-align': 'center'
            },
            td: {
              'text-align': 'center'
            }
          },
        pagination: {
            limit: 10,
            summary: false
        },
        sort: true

    }).render(usersListTableField);
})

