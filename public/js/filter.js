const showFilter = document.getElementById('show-filter');
const hideFilter = document.getElementById('hide-filter');
const filterOverlay = document.getElementById('filter-overlay');
const filterModal = document.getElementById('filter');
const applyFilterButton = document.getElementById('apply-filter');
const filterYearDropdown = document.getElementById('filter-year');
const filterAuthorButton = document.getElementById('filter-author-button');
const filterAuthorDropmenu = document.getElementById('filter-author-dropmenu');
const filterAuthorsField = document.getElementById('filter-authors');

async function getAuthors(value){
    const response = await fetch(
        '/get/author?value='+value,
        {
            method: 'GET'
        }
    );

    if(!response.ok){
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    
    const data = await response.json();
    return data['authors'];
}

function openFilterModal(){
    filterOverlay.classList.remove('hidden');
    filterModal.classList.remove('hidden','fadeOut');
    filterModal.classList.add('fadeIn');
}

function closeFilterModal(){
    filterOverlay.classList.add('hidden');
    filterModal.classList.remove('fadeIn');
    filterModal.classList.add('fadeOut');
    setTimeout(() => {
        filterModal.classList.add('hidden');
    }, 1000);   
}

showFilter.addEventListener('click', openFilterModal);
hideFilter.addEventListener('click', closeFilterModal);
filterOverlay.addEventListener('click', closeFilterModal);
applyFilterButton.addEventListener('click', closeFilterModal);

window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeFilterModal();
    }
});

var filterDropdownOpened = false
filterAuthorButton.addEventListener('click', function(){
    if(filterDropdownOpened){
        filterAuthorDropmenu.classList.add('hidden');
        filterDropdownOpened = false;
    }
    else{
        filterAuthorDropmenu.classList.remove('hidden');
        filterDropdownOpened = true;
    }
    
});

filterModal.addEventListener('click', function(event){
    const withinDropdown = event.composedPath().includes(filterAuthorButton);
    const withinDropmenu = event.composedPath().includes(filterAuthorDropmenu);
    if(!withinDropdown && !withinDropmenu){
        filterAuthorDropmenu.classList.add('hidden');
        filterDropdownOpened = false;
    }
});

filterYearDropdown.addEventListener('change', function(){
    getAuthors(filterYearDropdown.value).then(data => {
        changefilterAuthorDropmenu(data);
    })
});

function changefilterAuthorDropmenu(authors){
    filterAuthorDropmenu.innerHTML = '';
    if(authors.length > 0){
        filterAuthorDropmenu.classList.remove('h-fit');
        filterAuthorDropmenu.classList.add('h-32');
        var list = document.createElement('ul');
        list.classList.add('p-3','space-y-1','text-sm','text-gray-700');
        var selectAllOption = document.createElement('li');
        selectAllOption.innerHTML = `<div class="flex items-center px-2 py-1 rounded cursor-pointer hover:bg-gray-100">
                <input id="filter-author-all" type="checkbox" checked value="all" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1">
                <label for="filter-author-all" class="w-full ml-2 font-sans text-sm font-normal text-gray-700 rounded cursor-pointer">Select All</label>
            </div>`;

        list.appendChild(selectAllOption);
        for(let i = 0; i < authors.length; i++){
            var option = document.createElement('li');
            option.innerHTML = `<div class="flex items-center px-2 py-1 rounded cursor-pointer hover:bg-gray-100">
                    <input id="${authors[i]}" type="checkbox" checked value="${authors[i]}" class="filter-author w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1">
                    <label for="${authors[i]}" class="w-full ml-2 font-sans text-sm font-normal text-gray-700 rounded cursor-pointer">${authors[i]}</label>
                </div>`;
            list.appendChild(option);
        }
        filterAuthorDropmenu.appendChild(list);

        var authorCheckboxes = document.querySelectorAll('.filter-author');
        for(let i = 0; i < authorCheckboxes.length; i++){
            authors.push(authorCheckboxes[i].value);
            filterAuthorsField.value = authors.join(',');
        }
        for(let i = 0; i < authorCheckboxes.length; i++){
            authorCheckboxes[i].addEventListener('change', function(){
                var authors = [];
                for(let j = 0; j < authorCheckboxes.length; j++){
                    if(authorCheckboxes[j].checked){
                        authors.push(authorCheckboxes[j].value);
                    }
                }
                filterAuthorsField.value = authors.join(',');
            })
        }

        var selectAllInput = selectAllOption.querySelector('#filter-author-all');
        selectAllInput.addEventListener('change', function(){
            if(this.checked){
                for(let i = 0; i < authorCheckboxes.length; i++){
                    authorCheckboxes[i].checked = true;
                }
                for(let i = 0; i < authorCheckboxes.length; i++){
                    authors.push(authorCheckboxes[i].value);
                    filterAuthorsField.value = authors.join(',');
                }
            }
            else{
                for(let i = 0; i < authorCheckboxes.length; i++){
                    authorCheckboxes[i].checked = false;
                }
                filterAuthorsField.value = '';
            }
        });

    }
    else{
        filterAuthorDropmenu.classList.remove('h-32');
        filterAuthorDropmenu.classList.add('h-fit');
        filterAuthorDropmenu.innerHTML = `<p class="p-3 text-sm text-gray-700">No authors found</p>`
    }
}

getAuthors('all').then(data => {
    changefilterAuthorDropmenu(data);
})