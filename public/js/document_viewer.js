const documentViewButtons = document.querySelectorAll('.view');
const closeViewerButton = document.getElementById('close-viewer');
const documentViewerFrame = document.getElementById('viewer-frame');
const documentViewer = document.getElementById('viewer');

for(let i = 0; i < documentViewButtons.length; i++){
    documentViewButtons[i].addEventListener('click', function(){
        var source = this.getAttribute('data-file');
        documentViewerFrame.src = '/storage/' + source;
        documentViewer.classList.remove('hidden');
        closeViewerButton.classList.remove('hidden');
    });
}

closeViewerButton.addEventListener('click', function(){
    documentViewer.classList.add('hidden');
    closeViewerButton.classList.add('hidden');
})