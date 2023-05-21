const showFilter = document.getElementById('show-filter');
const hideFilter = document.getElementById('hide-filter');
const filterOverlay = document.getElementById('filter-overlay');
const filterModal = document.getElementById('filter');
const applyFilterButton = document.getElementById('apply-filter');

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
})