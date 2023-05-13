const body = document.body;
const confirmOverlay = document.getElementById('confirm-overlay');
const confirmModal = document.getElementById('confirm');
const deleteButtons = document.querySelectorAll('.delete');
const confirmButton = document.getElementById('delete-true');
const backButton = document.getElementById('delete-false');
const deleteForm = document.getElementById('delete-form');
const idField = document.getElementById('delete-id');
var activeCardId = -1;

var confirmModalOpened = false;
function openConfirmModal(){
    if(!confirmModalOpened){
        confirmOverlay.classList.remove('hidden');
        confirmModal.classList.remove('hidden','fadeOut');
        confirmModal.classList.add('fadeIn');
        setTimeout(() => {
            if(confirmModal.classList.contains('hidden')){
                confirmModal.classList.remove('hidden');
            }
        }, 1000);
        confirmModalOpened = true;
    }
}

function closeConfirmModal(){
    if(confirmModalOpened){
        confirmOverlay.classList.add('hidden');
        confirmModal.classList.remove('fadeIn');
        confirmModal.classList.add('fadeOut');
        setTimeout(() => {
            confirmModal.classList.add('hidden');
        }, 1000);
        confirmModalOpened = false;    
    }
}

for(let i = 0; i < deleteButtons.length; i++){
    deleteButtons[i].addEventListener('click', function(){
        openConfirmModal();
        activeCardId = parseInt(this.getAttribute('data-id'));
    });
}

confirmOverlay.addEventListener('click', closeConfirmModal);
backButton.addEventListener('click', closeConfirmModal);
window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeConfirmModal();
    }
});

confirmButton.addEventListener('click', function(){
    idField.value = activeCardId;
    deleteForm.submit();
});
