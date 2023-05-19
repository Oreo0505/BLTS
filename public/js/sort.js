const sortButton = document.getElementById('sort-button');
const sortDropdown = document.getElementById('sort-dropdown');

var sortDropdownOpened = false;
function toggleSortDropdown(){
    if(!sortDropdownOpened){
        sortDropdown.classList.remove('hidden');
        sortDropdownOpened = true;
    }
    else{
        sortDropdown.classList.add('hidden');
        sortDropdownOpened = false;
    }
}

sortButton.addEventListener('click', toggleSortDropdown);
window.addEventListener('click', function(event){
    const withinDropdown = event.composedPath().includes(sortDropdown);
    const withinButton = event.composedPath().includes(sortButton);
    if(!withinDropdown && !withinButton){
        sortDropdown.classList.add('hidden');
        sortDropdownOpened = false;
    }
});