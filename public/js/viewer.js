const viewButtons = document.querySelectorAll('.view');
const closeViewerButton = document.getElementById('close-viewer');
const viewerFrame = document.getElementById('viewer-frame');
const viewer = document.getElementById('viewer');

for(let i = 0; i < viewButtons.length; i++){
    viewButtons[i].addEventListener('click', function(){
        var source = this.getAttribute('data-file');
        viewerFrame.src = '/storage/' + source;
        viewer.classList.remove('hidden');
    });
}

closeViewerButton.addEventListener('click', function(){
    viewer.classList.add('hidden');
})