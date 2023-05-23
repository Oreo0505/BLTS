const searchForm = document.getElementById('search-form');
const searchField = document.getElementById('search-field');

searchField.addEventListener('keydown', function(event){
    if(event.key == 'Enter'){
        searchForm.submit();
    }
})