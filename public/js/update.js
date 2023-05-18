const updateButtons = document.querySelectorAll('.update');
const updateOverlay = document.getElementById('update-overlay');
const updateModal = document.getElementById('update');
const updateForm = document.getElementById('update-form');
const updateExitButton = document.getElementById('update-exit');
const updateCancelButton = document.getElementById('update-cancel');
const updateSubmitButton = document.getElementById('update-submit');
const updateIdField = document.getElementById('update-id');
const updateTitleField = document.getElementById('update-title');
const updateTypeField = document.getElementById('update-type');
const updateNumberField = document.getElementById('update-number');
const updateAreaField = document.getElementById('update-area');
const updateDateField = document.getElementById('update-date');
const updateDateIcon = document.getElementById('update-date-icon');
const updateAuthorDropdown = document.getElementById('update-author-dropdown');
const updateAuthorDropmenu = document.getElementById('update-author-dropmenu');
const updateAuthorOptions = document.querySelectorAll('.update-author');
const updateAuthorsField = document.getElementById('update-authors');
const updateFileField = document.getElementById('update-file');
const updateDropzone = document.getElementById('update-dropzone');
const updateFileContainer = document.getElementById('update-file-container');

async function getData(id){
    const response = await fetch(
        '/getData?id='+id,
        {
            method: 'GET'
        }
    );

    if(!response.ok){
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    
    const data = await response.json();
    return data;
}

var updateModalOpened = false;
function openUpdateModal(){
    if(!updateModalOpened){
        updateOverlay.classList.remove('hidden');
        updateModal.classList.remove('hidden','fadeOut');
        updateModal.classList.add('fadeIn');
        setTimeout(() => {
            if(updateModal.classList.contains('hidden')){
                updateModal.classList.remove('hidden');
            }
        }, 1000);
        updateModalOpened = true;
    }
}

function closeUpdateModal(){
    if(updateModalOpened){
        updateOverlay.classList.add('hidden');
        updateModal.classList.remove('fadeIn');
        updateModal.classList.add('fadeOut');
        setTimeout(() => {
            updateModal.classList.add('hidden');
        }, 1000);
        updateModalOpened = false;
        updateTitleField.value = '';
        updateTypeField.value = 'null';
        updateNumberField.value = '';
        updateAreaField.value = 'null';
        updateDateField.value = '';
        for(let i = 0; i < updateAuthorOptions.length; i++){
            updateAuthorOptions[i].checked = false;
        }
        updateFileField.value = '';
        var dataTransfer = new DataTransfer();
        updateFileField.files = dataTransfer.files;
    }
}

function showFileLabel(filename){
    var fileLabel =document.getElementById('update-label');
    if(fileLabel){
        updateFileContainer.removeChild(fileLabel);
    }
    fileLabel = document.createElement('div');
    fileLabel.id = 'update-label';
    fileLabel.classList.add('flex','flex-row','w-48','items-center','justify-between','space-x-1','pl-4','pr-3','py-2','rounded-full','border','border-gray-500');
    var fileLabelName = document.createElement('p');
    fileLabelName.classList.add('font-sans','font-normal','text-sm','text-black/50','whitespace-nowrap','overflow-hidden','text-ellipsis');
    fileLabelName.innerText = filename;
    var fileLabelRemoveButton = document.createElement('img');
    fileLabelRemoveButton.src = "/images/exit.svg"
    fileLabelRemoveButton.classList.add('p-1','rounded-full','bg-red-500','cursor-pointer');
    fileLabelRemoveButton.addEventListener('click', function(){
        var dataTransfer = new DataTransfer();
        updateFileField.value = '';
        updateFileField.files = dataTransfer.files;
        var fileLabel = document.getElementById('update-label');
        updateFileContainer.removeChild(fileLabel);
    });
    fileLabel.appendChild(fileLabelName);
    fileLabel.appendChild(fileLabelRemoveButton);
    updateFileContainer.appendChild(fileLabel);
}

updateExitButton.addEventListener('click', closeUpdateModal);
updateOverlay.addEventListener('click',closeUpdateModal);
window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeUpdateModal();
    }
})

var dropdownOpened = false
updateAuthorDropdown.addEventListener('click', function(){
    if(dropdownOpened){
        updateAuthorDropmenu.classList.add('hidden');
        dropdownOpened = false;
    }
    else{
        updateAuthorDropmenu.classList.remove('hidden');
        dropdownOpened = true;
    }
    
});

updateModal.addEventListener('click', function(event){
    const withinDropdown = event.composedPath().includes(updateAuthorDropdown);
    const withinDropmenu = event.composedPath().includes(updateAuthorDropmenu);
    if(!withinDropdown && !withinDropmenu){
        updateAuthorDropmenu.classList.add('hidden');
        dropdownOpened = false;
    }
});

updateDropzone.addEventListener('click', function(){
    updateFileField.click();
});

updateFileField.addEventListener('change', function(){
    showFileLabel(updateFileField.files[0].name);
});

for(let i = 0; i < updateButtons.length; i++){
    updateButtons[i].addEventListener('click', function(){
        var id = this.getAttribute('data-id');
        getData(id).then(data => {
            console.log(data);
            updateIdField.value = data['id'];
            updateTitleField.value = data['title'];
            updateTypeField.value = data['type'];
            updateNumberField.value = data['number'];
            updateAreaField.value = data['area'];
            updateDateField.value = data['date'];
            for(let i = 0; i < updateAuthorOptions.length; i++){
                if(data['authors'].includes(updateAuthorOptions[i].value)){
                    updateAuthorOptions[i].checked = true;
                }
            }
            loadURLToInputField('/storage/'+data['file'],data['file'].substring(10));
            showFileLabel(data['file'].substring(10));
        });
        openUpdateModal();
    });
}

updateSubmitButton.addEventListener('click', function(){
    if(updateTitleField.value.length < 3){
        alert('Title should be 3 or more character long');
        return;
    }
    if(updateTypeField.value == 'null'){
        alert('Please select document type');
        return;
    }
    if(updateNumberField.value.length <= 0){
        alert('Please enter document number');
        return;
    }
    if(isNaN(updateNumberField.value)){
        alert('Number field can only contain digits');
        return;
    }
    if(updateAreaField.value == 'null'){
        alert('Please select area of governance');
        return;
    }
    if(updateDateField.value.length <= 0){
        alert('Please select document date');
        return;
    }
    var authors = []
    for(let i = 0; i < updateAuthorOptions.length; i++){
        if(updateAuthorOptions[i].checked){
            authors.push(updateAuthorOptions[i].value);
        }
    }
    if(authors.length <= 0){
        alert('Please select at least one author');
        return;
    }
    if(updateFileField.files.length == 0){
        alert('Please upload a file');
        return;
    }
    updateTitleField.value = updateTitleField.value.toUpperCase();
    updateAuthorsField.value = authors.join(',');
    updateForm.submit();
});

function loadURLToInputField(url, fileName){
    getImgURL(url, (imgBlob)=>{
      // Load img blob to input
      // WIP: UTF8 character error
      let file = new File([imgBlob], fileName,{type:"application/pdf", lastModified:new Date().getTime()}, 'utf-8');
      let container = new DataTransfer(); 
      container.items.add(file);
      updateFileField.files = container.files;
      
    })
  }
  // xmlHTTP return blob respond
  function getImgURL(url, callback){
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        callback(xhr.response);
    };
    xhr.open('GET', url);
    xhr.responseType = 'blob';
    xhr.send();
  }