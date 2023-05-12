const drawer = document.getElementById('drawer');
const openDrawerButton = document.getElementById('open-drawer');
const closeDrawerButton = document.getElementById('close-drawer');

openDrawerButton.addEventListener('click', function(){
    closeFilterModal();
    drawer.classList.remove('hidden');
});

closeDrawerButton.addEventListener('click', function(){
    drawer.classList.add('hidden');
});
