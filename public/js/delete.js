const confirmDeleteOverlay = document.getElementById('confirm-delete-overlay');
const confirmDeleteModal = document.getElementById('confirm-delete');
const deleteButtons = document.querySelectorAll('.delete');
const confirmDeleteButton = document.getElementById('delete-true');
const backButton = document.getElementById('delete-false');
const deleteForm = document.getElementById('delete-form');
const deletedIdField = document.getElementById('delete-id');
var activeCardId = -1;

var confirmDeleteModalOpened = false;
function openConfirmDeleteModal(){
    if(!confirmDeleteModalOpened){
        confirmDeleteOverlay.classList.remove('hidden');
        confirmDeleteModal.classList.remove('hidden','fadeOut');
        confirmDeleteModal.classList.add('fadeIn');
        setTimeout(() => {
            if(confirmDeleteModal.classList.contains('hidden')){
                confirmDeleteModal.classList.remove('hidden');
            }
        }, 1000);
        confirmDeleteModalOpened = true;
    }
}

function closeConfirmDeleteModal(){
    if(confirmDeleteModalOpened){
        confirmDeleteOverlay.classList.add('hidden');
        confirmDeleteModal.classList.remove('fadeIn');
        confirmDeleteModal.classList.add('fadeOut');
        setTimeout(() => {
            confirmDeleteModal.classList.add('hidden');
        }, 1000);
        confirmDeleteModalOpened = false;    
    }
}

for(let i = 0; i < deleteButtons.length; i++){
    deleteButtons[i].addEventListener('click', function(){
        openConfirmDeleteModal();
        activeCardId = parseInt(this.getAttribute('data-id'));
    });
}

confirmDeleteOverlay.addEventListener('click', closeConfirmDeleteModal);
backButton.addEventListener('click', closeConfirmDeleteModal);
window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeConfirmDeleteModal();
    }
});

confirmDeleteButton.addEventListener('click', function(){
    deletedIdField.value = activeCardId;
    deleteForm.submit();
});
