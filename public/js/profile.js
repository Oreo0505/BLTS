const updateProfileButton = document.getElementById('update-profile-button');
const submitProfileButton = document.getElementById('submit-profile-button');
const cancelProfileButton = document.getElementById('cancel-profile-button');
const logoHolder = document.getElementById('logo-holder');
const updateLogoForm = document.getElementById('update-logo-form');
const updateLogoField = document.getElementById('update-logo-file');

const captainField = document.getElementById('captain');
const secretaryField = document.getElementById('secretary');
const chairmanField = document.getElementById('chairman');
const sb1Field = document.getElementById('sb1');
const sb2Field = document.getElementById('sb2');
const sb3Field = document.getElementById('sb3');
const sb4Field = document.getElementById('sb4');
const sb5Field = document.getElementById('sb5');
const sb6Field = document.getElementById('sb6');
const sb7Field = document.getElementById('sb7');

const captain = captainField.innerHTML;
const secretary = secretaryField.innerHTML;
const chairman = chairmanField.innerHTML;
const sb1 = sb1Field.innerHTML;
const sb2 = sb2Field.innerHTML;
const sb3 = sb3Field.innerHTML;
const sb4 = sb4Field.innerHTML;
const sb5 = sb5Field.innerHTML;
const sb6 = sb6Field.innerHTML;
const sb7 = sb7Field.innerHTML;

const updateProfileForm = document.getElementById('update-profile-form');
const updateProfileCaptain = document.getElementById('update-profile-captain');
const updateProfileSecretary = document.getElementById('update-profile-secretary');
const updateProfileChairman = document.getElementById('update-profile-chairman');
const updateProfileSb1 = document.getElementById('update-profile-sb1');
const updateProfileSb2 = document.getElementById('update-profile-sb2');
const updateProfileSb3 = document.getElementById('update-profile-sb3');
const updateProfileSb4 = document.getElementById('update-profile-sb4');
const updateProfileSb5 = document.getElementById('update-profile-sb5');
const updateProfileSb6 = document.getElementById('update-profile-sb6');
const updateProfileSb7 = document.getElementById('update-profile-sb7');


function updateProfile(){
    updateProfileButton.classList.add('hidden');
    submitProfileButton.classList.remove('hidden');
    cancelProfileButton.classList.remove('hidden');
    captainField.setAttribute('contenteditable', true);
    secretaryField.setAttribute('contenteditable', true);
    chairmanField.setAttribute('contenteditable', true);
    sb1Field.setAttribute('contenteditable', true);
    sb2Field.setAttribute('contenteditable', true);
    sb3Field.setAttribute('contenteditable', true);
    sb4Field.setAttribute('contenteditable', true);
    sb5Field.setAttribute('contenteditable', true);
    sb6Field.setAttribute('contenteditable', true);
    sb7Field.setAttribute('contenteditable', true);
    captainField.focus();
}

function submitUpdate(){
    submitProfileButton.classList.add('hidden');
    cancelProfileButton.classList.add('hidden');
    updateProfileButton.classList.remove('hidden');
    updateProfileCaptain.value = captainField.innerHTML;
    updateProfileSecretary.value = secretaryField.innerHTML;
    updateProfileChairman.value = chairmanField.innerHTML;
    updateProfileSb1.value = sb1Field.innerHTML;
    updateProfileSb2.value = sb2Field.innerHTML;
    updateProfileSb3.value = sb3Field.innerHTML;
    updateProfileSb4.value = sb4Field.innerHTML;
    updateProfileSb5.value = sb5Field.innerHTML;
    updateProfileSb6.value = sb6Field.innerHTML;
    updateProfileSb7.value = sb7Field.innerHTML;

    if(updateProfileChairman.value.length < 3){
        alert('Punong Barangay field should contain at least 3 or more characters');
        return;
    }
    if(updateProfileSecretary.value.length < 3){
        alert('Barangay Secretary field should contain at least 3 or more characters');
        return;
    }
    if(updateProfileChairman.value.length < 3){
        alert('SK Chairman field should contain at least 3 or more characters');
        return;
    }
    if(updateProfileSb1.value.length < 3){
        alert('SB Member No.1 field should contain at least 3 or more characters');
        return;
    }
    if(updateProfileSb2.value.length < 3){
        alert('SB Member No.1 field should contain at least 3 or more characters');
        return;
    }
    if(updateProfileSb3.value.length < 3){
        alert('SB Member No.1 field should contain at least 3 or more characters');
        return;
    }
    if(updateProfileSb4.value.length < 3){
        alert('SB Member No.1 field should contain at least 3 or more characters');
        return;
    }
    if(updateProfileSb5.value.length < 3){
        alert('SB Member No.1 field should contain at least 3 or more characters');
        return;
    }
    if(updateProfileSb6.value.length < 3){
        alert('SB Member No.1 field should contain at least 3 or more characters');
        return;
    }
    if(updateProfileSb7.value.length < 3){
        alert('SB Member No.1 field should contain at least 3 or more characters');
        return;
    }

    updateProfileForm.submit();
}

function cancelChanges(){
    submitProfileButton.classList.add('hidden');
    cancelProfileButton.classList.add('hidden');
    updateProfileButton.classList.remove('hidden');
    captainField.innerHTML = captain;
    secretaryField.innerHTML = secretary;
    chairmanField.innerHTML = chairman;
    sb1Field.innerHTML = sb1;
    sb2Field.innerHTML = sb2;
    sb3Field.innerHTML = sb3;
    sb4Field.innerHTML = sb4;
    sb5Field.innerHTML = sb5;
    sb6Field.innerHTML = sb6;
    sb7Field.innerHTML = sb7;
    captainField.setAttribute('contenteditable', false);
    secretaryField.setAttribute('contenteditable', false);
    chairmanField.setAttribute('contenteditable', false);
    sb1Field.setAttribute('contenteditable', false);
    sb2Field.setAttribute('contenteditable', false);
    sb3Field.setAttribute('contenteditable', false);
    sb4Field.setAttribute('contenteditable', false);
    sb5Field.setAttribute('contenteditable', false);
    sb6Field.setAttribute('contenteditable', false);
    sb7Field.setAttribute('contenteditable', false);
}

updateProfileButton.addEventListener('click', updateProfile);
submitProfileButton.addEventListener('click', submitUpdate);
cancelProfileButton.addEventListener('click', cancelChanges);

logoHolder.addEventListener('click', function(){
    updateLogoField.click();
})

updateLogoField.addEventListener('change', function(){
    updateLogoForm.submit();
});
