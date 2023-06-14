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
const uploadTermField = document.getElementById('upload-term');
const uploadAuthorDropdown = document.getElementById('dropdownBgHoverButton');
const uploadAuthorList = document.getElementById('upload-author-list');
const uploadAuthorsField = document.getElementById('upload-authors');
const uploadFileField = document.getElementById('upload-file');
const uploadDropzone = document.getElementById('upload-dropzone');
const uploadFileContainer = document.getElementById('upload-file-container');

async function getAuthors(value){
    const response = await fetch(
        '/get/author?value='+value,
        {
            method: 'GET'
        }
    );

    if(!response.ok){
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    
    const data = await response.json();
    return data['authors'];
}

async function getTerm(value){
    const response = await fetch(
        '/get/term?value='+value,
        {
            method: 'GET'
        }
    );

    if(!response.ok){
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    
    const data = await response.json();
    return data['term'];
}

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
    var uploadAuthorOptions = document.querySelectorAll('.upload-author');
    for(let i = 0; i < uploadAuthorOptions.length; i++){
        uploadAuthorOptions[i].checked = false;
    }
    uploadFileField.value = '';
    var dataTransfer = new DataTransfer();
    uploadFileField.files = dataTransfer.files;
    closeUploadModal();
});

uploadSubmitButton.addEventListener('click', function(){
    uploadSubmitButton.disabled = true;
    getTerm(uploadTermField.value).then(term => {
        if(uploadTitleField.value.length < 3){
            alert('Title should be 3 or more character long');
            uploadSubmitButton.disabled = false;
            return;
        }
        if(uploadTypeField.value == 'null'){
            alert('Please select document type');
            uploadSubmitButton.disabled = false;
            return;
        }
        if(uploadTypeField.value == 'Others' && uploadSpecificField.value.length <= 0){
            alert('Please specify document type');
            uploadSubmitButton.disabled = false;
            return;
        }
        if(uploadNumberField.value.length <= 0){
            alert('Please enter document number');
            uploadSubmitButton.disabled = false;
            return;
        }
        if(isNaN(uploadNumberField.value)){
            alert('Number field can only contain digits');
            uploadSubmitButton.disabled = false;
            return;
        }
        if(uploadAreaField.value == 'null'){
            alert('Please select area of governance');
            uploadSubmitButton.disabled = false;
            return;
        }
        if(uploadDateField.value.length <= 0){
            alert('Please select document date');
            uploadSubmitButton.disabled = false;
            return;
        }
        let start = new Date(term['start']);
        let end = new Date(term['end']);
        let dateSelected = new Date(uploadDateField.value);
        if(!(dateSelected >= start && dateSelected <= end)){
            alert('Date enacted / adopted should be within the selected administrative term duration range');
            uploadSubmitButton.disabled = false;
            return;
        }
        var authors = []
        var uploadAuthorOptions = document.querySelectorAll('.upload-author');
        for(let i = 0; i < uploadAuthorOptions.length; i++){
            if(uploadAuthorOptions[i].checked){
                authors.push(uploadAuthorOptions[i].value);
            }
        }
        var uploadCustomAuthors = document.querySelectorAll('.upload-custom-author');
        for(let i = 0; i < uploadCustomAuthors.length; i++){
            if(uploadCustomAuthors[i].value.length >= 3){
                authors.push(uploadCustomAuthors[i].value);   
            }
        }
        if(uploadFileField.files.length == 0){
            alert('Please upload a file');
            uploadSubmitButton.disabled = false;
            return;
        }
        uploadSubmitButton.disabled = true;
        uploadTitleField.value = uploadTitleField.value.toUpperCase();
        uploadAuthorsField.value = authors.join(',');
        uploadForm.submit();
    });
});

uploadTermField.addEventListener('change', function(){
    getAuthors(uploadTermField.value).then(data => {
        changeUploadAuthorSelection(data);
    });
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

function changeUploadAuthorDropdownCounter(selected, length){
    uploadAuthorDropdown.innerHTML = `Select authors (${selected} out of ${length} selected)
    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
    </svg>`;
}

function changeUploadAuthorSelection(data){
    changeUploadAuthorDropdownCounter(0, data.length);
    uploadAuthorList.innerHTML = '';
    var uploadSelectAllAuthorOption = document.createElement('li');
    uploadSelectAllAuthorOption.innerHTML = `<div class="flex items-center p-2 rounded hover:bg-gray-100">
            <input id="upload-select-all-author" type="checkbox" value="all" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1">
            <label for="upload-select-all-author" class="w-full ml-2 font-sans text-sm font-normal text-gray-700 rounded cursor-pointer">Select All</label>
        </div>`;
    uploadSelectAllAuthorCheckbox = uploadSelectAllAuthorOption.querySelector('#upload-select-all-author');
    uploadSelectAllAuthorCheckbox.addEventListener('click', function(){
        var uploadAuthorOptions = document.querySelectorAll('.upload-author');
        if(uploadSelectAllAuthorCheckbox.checked){
            for(let i = 0; i < uploadAuthorOptions.length; i++){
                uploadAuthorOptions[i].checked = true;
            }
            changeUploadAuthorDropdownCounter(uploadAuthorOptions.length, uploadAuthorOptions.length);
        }
        else{
            for(let i = 0; i < uploadAuthorOptions.length; i++){
                uploadAuthorOptions[i].checked = false;
            } 
            changeUploadAuthorDropdownCounter(0, uploadAuthorOptions.length);
        }
    });
    uploadAuthorList.appendChild(uploadSelectAllAuthorOption);
    for(let i = 0; i < data.length; i++){
        var authorOption = document.createElement('li');
        authorOption.innerHTML = `<div class="flex items-center p-2 rounded hover:bg-gray-100">
                <input id="upload-${data[i]}" type="checkbox" value="${data[i]}" class="upload-author w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1">
                <label for="upload-${data[i]}" class="w-full ml-2 font-sans text-sm font-normal text-gray-700 rounded cursor-pointer">${data[i]}</label>
            </div>`
        var currentUploadAuthorInput = authorOption.querySelector('.upload-author')
        currentUploadAuthorInput.addEventListener('change', function(){
            var uploadAuthorOptions = document.querySelectorAll('.upload-author');
            var selected = 0
            for(let i = 0; i < uploadAuthorOptions.length; i++){
                if(uploadAuthorOptions[i].checked){
                    selected++;
                }
            }
            if(selected == uploadAuthorOptions.length){
                uploadSelectAllAuthorCheckbox.checked = true;
            }
            else{
                uploadSelectAllAuthorCheckbox.checked = false;
            }
            changeUploadAuthorDropdownCounter(selected, uploadAuthorOptions.length);
        });
        uploadAuthorList.appendChild(authorOption);
    }
    uploadAddAuthorButton = document.createElement('button');
    uploadAddAuthorButton.classList.add('w-full','flex','p-2','rounded','hover:bg-gray-100','rounded-md','font-sans','font-normal','text-sm','text-gray-700','justify-center');
    uploadAddAuthorButton.innerHTML = '+ Add Other Author';
    uploadAddAuthorButton.type = 'button';
    uploadAddAuthorButton.addEventListener('click', function(){
        let uploadCustomAuthorOption = document.createElement('li');
        uploadCustomAuthorOption.innerHTML = `<div class="flex flex-col mt-4">
                <input type="text" id="upload-custom-author" placeholder="Enter author's name" class="upload-custom-author w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                <label for="upload-custom-author" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                    Author Name
                </label>
            </div>`;
        uploadAuthorList.appendChild(uploadCustomAuthorOption);
    })
    uploadAuthorList.appendChild(uploadAddAuthorButton);
}

getAuthors('current').then(data => {
    changeUploadAuthorSelection(data);
});

getTerm('current').then(term => {
    var start = new Date(term['start']);
    var end = new Date(term['end']);
    uploadTermField.value = start.getFullYear()+'-'+end.getFullYear();
});