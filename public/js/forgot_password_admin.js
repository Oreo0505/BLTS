const changePasswordButton = document.getElementById('change-password-button');
const form = document.getElementById('form');
const emailField = document.getElementById('email');
const passwordField = document.getElementById('password');
const passwordConfirmationField = document.getElementById('password_confirmation');

changePasswordButton.addEventListener('click', function() {
    changePasswordButton.disabled = true;

    if (emailField.value.trim().length === 0) {
        alert('Email is required');
        changePasswordButton.disabled = false;
        return;
    }

    if (passwordField.value.trim().length === 0) {
        alert('Password is required');
        changePasswordButton.disabled = false;
        return;
    }

    if (passwordConfirmationField.value.trim().length === 0) {
        alert('Password confirmation is required');
        changePasswordButton.disabled = false;
        return;
    }

    if (passwordField.value !== passwordConfirmationField.value) {
        alert('Passwords do not match');
        changePasswordButton.disabled = false;
        return;
    }

    form.submit();
});
