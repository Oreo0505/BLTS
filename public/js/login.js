const loginButton = document.getElementById('login-button');
const loginForm = document.getElementById('login-form');
const emailField = document.getElementById('email');
const passwordField = document.getElementById('password'); 


loginButton.addEventListener('click', function(event){
    event.preventDefault();
    if (emailField.value.length == 0){
        return;
    }
    if (passwordField.value.length == 0){
        return;
    }
    loginForm.submit();
});

