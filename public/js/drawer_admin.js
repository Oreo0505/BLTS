document.addEventListener('DOMContentLoaded', function() {
    const adminDrawer = document.getElementById('drawer-admin');
    const drawerOverlay = document.getElementById('drawer-overlay');
    const openDrawerButton = document.getElementById('open-drawer');
    const closeDrawerButton = document.getElementById('close-drawer');

    function openDrawer(){
        drawerOverlay.classList.remove('hidden');
        adminDrawer.classList.remove('hidden');
    }

    function closeDrawer(){
        drawerOverlay.classList.add('hidden');
        adminDrawer.classList.add('hidden');
    }

    openDrawerButton.addEventListener('click', openDrawer);
    closeDrawerButton.addEventListener('click', closeDrawer);
    drawerOverlay.addEventListener('click', closeDrawer);
});