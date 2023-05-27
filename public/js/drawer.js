const drawer = document.getElementById('drawer');
const drawerOverlay = document.getElementById('drawer-overlay');
const openDrawerButton = document.getElementById('open-drawer');
const closeDrawerButton = document.getElementById('close-drawer');
const logoHolder = document.getElementById('logo-holder');
const updateLogoForm = document.getElementById('update-logo-form');
const updateLogoField = document.getElementById('update-logo-file');

function openDrawer(){
    drawerOverlay.classList.remove('hidden');
    drawer.classList.remove('hidden');
}

function closeDrawer(){
    drawerOverlay.classList.add('hidden');
    drawer.classList.add('hidden');
}

openDrawerButton.addEventListener('click', openDrawer);

closeDrawerButton.addEventListener('click', closeDrawer);

drawerOverlay.addEventListener('click', closeDrawer);

logoHolder.addEventListener('click', function(){
    updateLogoField.click();
})

updateLogoField.addEventListener('change', function(){
    updateLogoForm.submit();
});
