const profileMenuButton = document.getElementById('profile-menu-button');
const profileMenu = document.getElementById('profile-menu');
const profileMenuYears = document.getElementById('profile-menu-years');
const previousTermsButton = document.getElementById('previous-terms-button');
const previousTermsIcon = document.getElementById('previous-terms-icon');

var profileMenuOpened = false;
var profileMenuYearsOpenend = false
profileMenuButton.addEventListener('click', function(){
    if(profileMenuOpened){
        profileMenu.classList.add('hidden');
        profileMenuYears.classList.add('hidden');
        profileMenuOpened = false;
    }
    else{
        profileMenu.classList.remove('hidden');
        // profileMenuYears.classList.remove('hidden');  
        profileMenuOpened = true;
    }
});

window.addEventListener('click', function(event){
    const withinProfileMenuButton = event.composedPath().includes(profileMenuButton);
    const withinProfileMenu = event.composedPath().includes(profileMenu);
    const withinProfileMenuYear = event.composedPath().includes(profileMenuYears);
    if(!withinProfileMenuButton && !withinProfileMenu && !withinProfileMenuYear){
        profileMenu.classList.add('hidden');
        profileMenuYears.classList.add('hidden');
        profileMenuOpened = false;
        profileMenuYearsOpenend = false;
    }
})

previousTermsButton.addEventListener('click', function(){
    if(profileMenuYearsOpenend){
        previousTermsIcon.classList.add('-rotate-90','translate-y-1.5');
        profileMenuYears.classList.add('hidden'); 
        profileMenuYearsOpenend = false;
    }
    else{
        previousTermsIcon.classList.remove('-rotate-90','translate-y-1.5');
        profileMenuYears.classList.remove('hidden'); 
        profileMenuYearsOpenend = true;
    }
});

previousTermsButton.addEventListener('mouseenter', function(){
    previousTermsIcon.classList.remove('-rotate-90','translate-y-1.5');
    profileMenuYears.classList.remove('hidden'); 
    profileMenuYearsOpenend = true;
});