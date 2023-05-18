const enterFullscreenButton = document.getElementById('enter-fullscreen');
const exitFullscreenButton = document.getElementById('exit-fullscreen');

var fullscreen = false;

function openFullscreen(){
    if(!fullscreen){
        enterFullscreenButton.classList.add('hidden');
        exitFullscreenButton.classList.remove('hidden');
        document.documentElement.requestFullscreen();
        fullscreen = true;
    }
}

function closeFullscreen(){
    if(fullscreen){
        enterFullscreenButton.classList.remove('hidden');
        exitFullscreenButton.classList.add('hidden');
        document.exitFullscreen();
        fullscreen = false;
    }
}

enterFullscreenButton.addEventListener('click', openFullscreen);
exitFullscreenButton.addEventListener('click', closeFullscreen);