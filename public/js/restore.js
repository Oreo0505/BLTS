const body = document.body;
const confirmRestoreOverlay = document.getElementById('confirm-restore-overlay');
const confirmRestoreModal = document.getElementById('confirm-restore');
const restoreButtons = document.querySelectorAll('.restore');
const confirmRestoreButton = document.getElementById('restore-true');
const confirmRestoreBackButton = document.getElementById('restore-false');
const restoreForm = document.getElementById('restore-form');
const restoreIdField = document.getElementById('restore-id');
var activeCardId = -1;

var confirmRestoreModalOpened = false;
function openConfirmModal(){
    if(!confirmRestoreModalOpened){
        confirmRestoreOverlay.classList.remove('hidden');
        confirmRestoreModal.classList.remove('hidden','fadeOut');
        confirmRestoreModal.classList.add('fadeIn');
        setTimeout(() => {
            if(confirmRestoreModal.classList.contains('hidden')){
                confirmRestoreModal.classList.remove('hidden');
            }
        }, 1000);
        confirmRestoreModalOpened = true;
    }
}

function closeConfirmModal(){
    if(confirmRestoreModalOpened){
        confirmRestoreOverlay.classList.add('hidden');
        confirmRestoreModal.classList.remove('fadeIn');
        confirmRestoreModal.classList.add('fadeOut');
        setTimeout(() => {
            confirmRestoreModal.classList.add('hidden');
        }, 1000);
        confirmRestoreModalOpened = false;    
    }
}

for(let i = 0; i < restoreButtons.length; i++){
    restoreButtons[i].addEventListener('click', function(){
        openConfirmModal();
        activeCardId = parseInt(this.getAttribute('data-id'));
    });
}

confirmRestoreOverlay.addEventListener('click', closeConfirmModal);
confirmRestoreBackButton.addEventListener('click', closeConfirmModal);
window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeConfirmModal();
    }
});

confirmRestoreButton.addEventListener('click', function(){
    restoreIdField.value = activeCardId;
    restoreForm.submit();
});
