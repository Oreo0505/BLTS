const searchForm = document.getElementById('search-form');
const searchField = document.getElementById('search-field');

searchField.addEventListener('keydown', function(event){
    if(event.key == 'Enter'){
        event.preventDefault();
        if(searchField.value.length < 3){
            alert('Please enter at least 3 characters');
            return;
        }
        else{
            searchForm.submit();
        }
    }
})