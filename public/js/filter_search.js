const showFilter = document.getElementById('show-filter');
const hideFilter = document.getElementById('hide-filter');
const filterOverlay = document.getElementById('filter-overlay');
const filterModal = document.getElementById('filter');
const applyFilterButton = document.getElementById('apply-filter');
const searchField = document.getElementById('search-field');
const searchByField = document.getElementById('filter-searchBy');
const searchYear = document.getElementById('filter-year');
const searchArea = document.getElementById('filter-area');
const searchCheckboxes = document.querySelectorAll('.filter-checkbox');
const searchForm = document.getElementById('search-form');
const searchQuery = document.getElementById('search-query');
const filterQuery = document.getElementById('filter-query');

function openFilterModal(){
    submitSearch();
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
applyFilterButton.addEventListener('click',function(){
    // Apply filters
    closeFilterModal();
});

window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeFilterModal();
    }
})

function submitSearch(){
    searchQuery.value = searchField.value;
    var query = '';
    query += searchByField.value + ',';
    query += searchYear.value + ',';
    query += searchArea.value + ',';
    var checkboxValues = [];
    for(let i = 0; i < searchCheckboxes.length; i++){
        if(searchCheckboxes[i].checked){
            checkboxValues.push(searchCheckboxes[i].value);
        }
    }
    query += checkboxValues.join(',');
    console.log(query);
}