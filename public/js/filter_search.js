const showFilter = document.getElementById('show-filter');
const hideFilter = document.getElementById('hide-filter');
const filterOverlay = document.getElementById('filter-overlay');
const filterModal = document.getElementById('filter');
const applyFilterButton = document.getElementById('apply-filter');
const search = document.getElementById('search');
const searchByField = document.getElementById('filter-searchBy');
const yearField = document.getElementById('filter-year');
const submittedField = document.getElementById('filter-submitted');
const endorsedField = document.getElementById('filter-endorsed');
const enactedField = document.getElementById('filter-enacted');
const adoptedField = document.getElementById('filter-adopted');
const codeOfOrdinanceField = document.getElementById('filter-code');
const endorsementField = document.getElementById('filter-endorsement');
const ordinanceField = document.getElementById('filter-ordinance');
const petitionField = document.getElementById('filter-petition');
const proposalField = document.getElementById('filter-proposal');
const resolutionField = document.getElementById('filter-resolution');
const othersField = document.getElementById('filter-others');

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
    var json = {
        "search": "",
        "search_by": "",
        "year": "",
        "submitted": "",
        "endorsed": "",
        "enacted": "",
        "adopted": "",
        "code_of_ordinance": "",
        "endorsement": "",
        "ordinance": "",
        "petition": "",
        "proposal": "",
        "resolution": "",
        "others": ""
    }
}