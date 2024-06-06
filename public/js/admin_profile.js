document.addEventListener('DOMContentLoaded', function () {
    const updateProfileButton = document.getElementById('update-profile-button');
    const submitProfileButton = document.getElementById('submit-profile-button');
    const cancelProfileButton = document.getElementById('cancel-profile-button');
    const confirmUpdateProfileOverlay = document.getElementById('confirm-profile-update-overlay');
    const confirmUpdateProfileModal = document.getElementById('confirm-profile-update');
    const confirmSubmitProfileButton = document.getElementById('update-true');
    const confirmCancelProfileButton = document.getElementById('update-false');

    const logoHolder = document.getElementById('logo-holder');
    const updateLogoForm = document.getElementById('update-logo-form');
    const updateLogoField = document.getElementById('update-logo-file');

    const updateProfileForm = document.getElementById('update-profile-form');

    function updateProfile() {
        updateProfileButton.classList.add('hidden');
        submitProfileButton.classList.remove('hidden');
        cancelProfileButton.classList.remove('hidden');
    }

    function submitUpdate() {
        submitProfileButton.classList.add('hidden');
        cancelProfileButton.classList.add('hidden');
        updateProfileButton.classList.remove('hidden');

        updateProfileForm.submit();
    }

    var updateConfirmModalOpened = false;
    function openUpdateProfileConfirmation() {
        confirmUpdateProfileOverlay.classList.remove('hidden');
        confirmUpdateProfileModal.classList.remove('hidden');
        updateConfirmModalOpened = true;
    }

    function closeUpdateProfileConfirmation() {
        confirmUpdateProfileOverlay.classList.add('hidden');
        confirmUpdateProfileModal.classList.add('hidden');
        updateConfirmModalOpened = false;
        cancelChanges();
    }

    function cancelChanges() {
        submitProfileButton.classList.add('hidden');
        cancelProfileButton.classList.add('hidden');
        updateProfileButton.classList.remove('hidden');
    }

    updateProfileButton.addEventListener('click', updateProfile);
    submitProfileButton.addEventListener('click', openUpdateProfileConfirmation);
    cancelProfileButton.addEventListener('click', cancelChanges);
    confirmSubmitProfileButton.addEventListener('click', submitUpdate);
    confirmCancelProfileButton.addEventListener('click', closeUpdateProfileConfirmation);

    window.addEventListener('keydown', function(event) {
        if (event.key == 'Escape') {
            closeUpdateProfileConfirmation();
        }
    });

    logoHolder.addEventListener('click', function() {
        updateLogoField.click();
    });

    updateLogoField.addEventListener('change', function() {
        updateLogoForm.submit();
    });

});
