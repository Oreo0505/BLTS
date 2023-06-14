const renewOverlay = document.getElementById('renew-overlay');
const renewModal = document.getElementById('renew');
const closeRenewModalButton = document.getElementById('renew-false');

function closeRenewModal(){
    renewOverlay.classList.add('hidden');
    renewModal.classList.remove('fadeIn');
    renewModal.classList.add('fadeOut');
    setTimeout(() => {
        renewModal.classList.add('hidden');
    }, 1000);
}

closeRenewModalButton.addEventListener('click', closeRenewModal);