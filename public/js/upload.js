const uploadFAB = document.getElementById('upload-fab');
const uploadOverlay = document.getElementById('upload-overlay');
const uploadModal = document.getElementById('upload');
const uploadForm = document.getElementById('upload-form');
const uploadExitButton = document.getElementById('upload-exit');
const uploadCancelButton = document.getElementById('upload-cancel');
const uploadSubmitButton = document.getElementById('upload-submit');
const uploadTitleField = document.getElementById('upload-title');
const uploadTypeField = document.getElementById('upload-type');
const uploadSpecificContainer = document.getElementById('upload-specific-container');
const uploadSpecificField = document.getElementById('upload-specific');
const uploadNumberField = document.getElementById('upload-number');
const uploadAreaField = document.getElementById('upload-area');
const uploadDateField = document.getElementById('upload-date');
const uploadDateIcon = document.getElementById('upload-date-icon');
const uploadAuthorDropdown = document.getElementById('dropdownBgHoverButton');
const uploadAuthorOptions = document.querySelectorAll('.upload-author');
const uploadAuthorsField = document.getElementById('upload-authors');
const uploadFileField = document.getElementById('upload-file');
const uploadDropzone = document.getElementById('upload-dropzone');
const uploadFileContainer = document.getElementById('upload-file-container');

var uploadModalOpened = false;
function openUploadModal(){
    if(!uploadModalOpened){
        uploadOverlay.classList.remove('hidden');
        uploadModal.classList.remove('hidden','fadeOut');
        uploadModal.classList.add('fadeIn');
        setTimeout(() => {
            if(uploadModal.classList.contains('hidden')){
                uploadModal.classList.remove('hidden');
            }
        }, 1000);
        uploadModalOpened = true;
    }
}

function closeUploadModal(){
    if(uploadModalOpened){
        uploadOverlay.classList.add('hidden');
        uploadModal.classList.remove('fadeIn');
        uploadModal.classList.add('fadeOut');
        setTimeout(() => {
            uploadModal.classList.add('hidden');
        }, 1000);
        uploadModalOpened = false;    
    }
}

uploadFAB.addEventListener('click', openUploadModal);
uploadExitButton.addEventListener('click', closeUploadModal);
uploadOverlay.addEventListener('click',closeUploadModal);
window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeUploadModal();
    }
})

uploadTypeField.addEventListener('change', function(){
    if(uploadTypeField.value == 'Others'){
        uploadSpecificContainer.classList.remove('hidden');
    }
    else{
        uploadSpecificContainer.classList.add('hidden');
    }
});

uploadDateIcon.addEventListener('click', function(){
    uploadDateField.focus();
})

uploadDropzone.addEventListener('click', function(){
    uploadFileField.click();
});

uploadFileField.addEventListener('change', function(){
    showUploadedLabel(uploadFileField.files[0].name);
});

uploadCancelButton.addEventListener('click', function(){
    uploadTitleField.value = '';
    uploadTypeField.selectedIndex = 0;
    uploadNumberField.value = '';
    uploadAreaField.selectedIndex = 0;
    uploadDateField.value = '';
    uploadAuthorOptions.selectedIndex = 0;
    uploadFileField.value = '';
    var dataTransfer = new DataTransfer();
    uploadFileField.files = dataTransfer.files;
    closeUploadModal();
});

uploadSubmitButton.addEventListener('click', function(){
    if(uploadTitleField.value.length < 3){
        alert('Title should be 3 or more character long');
        return;
    }
    if(uploadTypeField.value == 'null'){
        alert('Please select document type');
        return;
    }
    if(uploadTypeField.value == 'Others' && uploadSpecificField.value.length <= 0){
        alert('Please specify document type');
        return;
    }
    if(uploadNumberField.value.length <= 0){
        alert('Please enter document number');
        return;
    }
    if(isNaN(uploadNumberField.value)){
        alert('Number field can only contain digits');
        return;
    }
    if(uploadAreaField.value == 'null'){
        alert('Please select area of governance');
        return;
    }
    if(uploadDateField.value.length <= 0){
        alert('Please select document date');
        return;
    }
    var authors = []
    for(let i = 0; i < uploadAuthorOptions.length; i++){
        if(uploadAuthorOptions[i].checked){
            authors.push(uploadAuthorOptions[i].value);
        }
    }
    if(uploadFileField.files.length == 0){
        alert('Please upload a file');
        return;
    }
    uploadTitleField.value = uploadTitleField.value.toUpperCase();
    uploadAuthorsField.value = authors.join(',');
    uploadForm.submit();
});

function showUploadedLabel(filename){
    var uploadedLabel =document.getElementById('upload-label');
    if(uploadedLabel){
        uploadFileContainer.removeChild(uploadedLabel);
    }
    uploadedLabel = document.createElement('div');
    uploadedLabel.id = 'upload-label';
    uploadedLabel.classList.add('flex','flex-row','w-48','items-center','justify-between','space-x-1','pl-4','pr-3','py-2','rounded-full','border','border-gray-500');
    var uploadedLabelName = document.createElement('p');
    uploadedLabelName.classList.add('font-sans','font-normal','text-sm','text-black/50','whitespace-nowrap','overflow-hidden','text-ellipsis');
    uploadedLabelName.innerText = filename;
    var uploadedLabelRemoveButton = document.createElement('img');
    uploadedLabelRemoveButton.src = "/images/exit.svg"
    uploadedLabelRemoveButton.classList.add('p-1','rounded-full','cursor-pointer','hover:bg-[#F5F5F5]');
    uploadedLabelRemoveButton.addEventListener('click', function(){
        var dataTransfer = new DataTransfer();
        uploadFileField.value = '';
        uploadFileField.files = dataTransfer.files;
        var uploadedLabel = document.getElementById('upload-label');
        uploadFileContainer.removeChild(uploadedLabel);
    });
    uploadedLabel.appendChild(uploadedLabelName);
    uploadedLabel.appendChild(uploadedLabelRemoveButton);
    uploadFileContainer.appendChild(uploadedLabel)
}