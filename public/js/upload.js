const uploadFAB = document.getElementById('upload-fab');
const uploadOverlay = document.getElementById('upload-overlay');
const uploadModal = document.getElementById('upload');
const uploadForm = document.getElementById('upload-form');
const uploadExitButton = document.getElementById('upload-exit');
const uploadCancelButton = document.getElementById('upload-cancel');
const uploadSubmitButton = document.getElementById('upload-submit');
const titleField = document.getElementById('upload-title');
const typeField = document.getElementById('upload-type');
const numberField = document.getElementById('upload-number');
const actionField = document.getElementById('upload-action');
const dateField = document.getElementById('upload-date');
const authorField = document.getElementById('upload-author');
const sponsorField = document.getElementById('upload-sponsor');
const fileField = document.getElementById('upload-file');
const dropzone = document.getElementById('dropzone');
const uploadFileContainer = document.getElementById('upload-file-container');

function openUploadModal(){
    uploadOverlay.classList.remove('hidden');
    uploadModal.classList.remove('hidden','fadeOut');
    uploadModal.classList.add('fadeIn');
}

function closeUploadModal(){
    uploadOverlay.classList.add('hidden');
    uploadModal.classList.remove('fadeIn');
    uploadModal.classList.add('fadeOut');
    setTimeout(() => {
        uploadModal.classList.add('hidden');
    }, 1000);   
}

uploadFAB.addEventListener('click', openUploadModal);
uploadExitButton.addEventListener('click', closeUploadModal);
window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeUploadModal();
    }
})

dropzone.addEventListener('click', function(){
    fileField.click();
});

fileField.addEventListener('change', function(){
    showUploadedLabel(fileField.files[0].name);
});

uploadCancelButton.addEventListener('click', function(){
    titleField.value = '';
    typeField.selectedIndex = 0;
    numberField.value = '';
    actionField.selectedIndex = 0;
    dateField.value = '';
    authorField.value = '';
    sponsorField.value = '';
    fileField.value = '';
    var dataTransfer = new DataTransfer();
    fileField.files = dataTransfer.files;
    closeUploadModal();
});

uploadSubmitButton.addEventListener('click', function(){
    if(titleField.value.length < 3){
        alert('Title should be 3 or more character long');
        return;
    }
    if(typeField.value == 'null'){
        alert('Please select document type');
        return;
    }
    if(numberField.value.length <= 0){
        alert('Please enter document number');
        return;
    }
    if(!/^\d+\.\d+$/.test(numberField.value)){
        alert('Number field can only contain digits');
        return;
    }
    if(actionField.value == 'null'){
        alert('Please select action taken');
        return;
    }
    if(dateField.value.length <= 0){
        alert('Please select document date');
        return;
    }
    if(authorField.value.length <= 0){
        alert('Please enter at least one author');
        return;
    }
    if(fileField.files.length == 0){
        alert('Please upload a file');
        return;
    }
    if(sponsorField.value.length <= 0){
        sponsorField.value = authorField.value;
    }
    uploadForm.submit();
});

function showUploadedLabel(filename){
    var uploadedLabel =document.getElementById('upload-label');
    if(uploadedLabel){
        uploadFileContainer.removeChild(uploadedLabel);
    }
    uploadedLabel = document.createElement('div');
    uploadedLabel.id = 'upload-label';
    uploadedLabel.classList.add('flex','flex-row','w-48','items-center','justify-between','px-4','py-2','rounded-full','border','border-gray-500');
    var uploadedLabelName = document.createElement('p');
    uploadedLabelName.classList.add('font-sans','font-normal','text-sm','text-black/50','whitespace-nowrap','overflow-hidden','text-ellipsis');
    uploadedLabelName.innerText = filename;
    var uploadedLabelRemoveButton = document.createElement('img');
    uploadedLabelRemoveButton.src = "/images/exit.svg"
    uploadedLabelRemoveButton.classList.add('p-1','rounded-full','bg-red-500','cursor-pointer');
    uploadedLabelRemoveButton.addEventListener('click', function(){
        var dataTransfer = new DataTransfer();
        fileField.value = '';
        fileField.files = dataTransfer.files;
        var uploadedLabel = document.getElementById('upload-label');
        uploadFileContainer.removeChild(uploadedLabel);
    });
    uploadedLabel.appendChild(uploadedLabelName);
    uploadedLabel.appendChild(uploadedLabelRemoveButton);
    uploadFileContainer.appendChild(uploadedLabel)
}