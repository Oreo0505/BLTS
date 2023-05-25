const addTermForm = document.getElementById('add-term-form');
const fromDateField = document.getElementById('from');
const toDateField = document.getElementById('to');
const captainField = document.getElementById('captain');
const secretaryField = document.getElementById('secretary');
const sbFields = document.querySelectorAll('.sb-member');
const chairmanField = document.getElementById('chairman');
const addTermButton = document.getElementById('add-term-button');
const fromDateIcon = document.getElementById('from-date-icon');
const toDateIcon = document.getElementById('to-date-icon');

fromDateIcon.addEventListener('click', function(){
    fromDateField.focus();
});

toDateIcon.addEventListener('click', function(){
    toDateField.focus();
});

addTermButton.addEventListener('click', function(){
    if(fromDateField.value.length <= 0){
        alert('Please select term start date');
        return;
    }
    if(toDateField.value.length <= 0){
        alert('Please select term end date');
        return;
    }
    var fromDate = new Date(fromDateField.value);
    var toDate = new Date(toDateField.value);
    if(toDate < fromDate){
        alert('Invalid date range. End date should be later than start date.');
        return;
    }
    if(captainField.value.length < 3){
        alert('Barangay captain field should contain at least 3 or more characters');
        return;
    }
    if(secretaryField.value.length < 3){
        alert('Barangay secretary field should contain at least 3 or more characters');
        return;
    }
    for(let i = 0; i < sbFields.length; i++){
        if(sbFields[i].value.length <= 0){
            alert('Missing Sangguiniang Barangay Member');
            return;
        }
        else if(sbFields[i].value.length < 3){
            alert('SB Member name should contain at least 3 or more characters');
            return;
        }
    }
    if(chairmanField.value.length < 3){
        alert('SK Chairman name should contain at least 3 or more characters');
        return;
    }
    addTermForm.submit();
});