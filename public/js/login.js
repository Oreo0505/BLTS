const loginButton = document.getElementById('login-button');
const form = document.getElementById('form');
const emailField = document.getElementById('email');
const passwordField = document.getElementById('password'); 


loginButton.addEventListener('click', function(){
    loginButton.disabled = true;
    if(emailField.value.length == 0){
        alert('Email is required');
        loginButton.disabled = false;
        return;
    }

    if(passwordField.value.length == 0){
        alert('Password is required');
        loginButton.disabled = false;
        return;
    }

    form.submit();
})
