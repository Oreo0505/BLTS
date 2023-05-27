const searchForm = document.getElementById('search-form');
const searchField = document.getElementById('search-field');
const searchFilterButton = document.getElementById('search-filter');

searchField.addEventListener('keydown', function(event){
    if(event.key == 'Enter'){
        searchForm.submit();
    }
})

searchFilterButton.addEventListener('click', function(){
    searchField.value = '';
    searchForm.submit();
});