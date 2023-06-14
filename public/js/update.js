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
const updateSpecificContainer = document.getElementById('update-specific-container');
const updateSpecificField = document.getElementById('update-specific');
const updateNumberField = document.getElementById('update-number');
const updateAreaField = document.getElementById('update-area');
const updateDateField = document.getElementById('update-date');
const updateDateIcon = document.getElementById('update-date-icon');
const updateTermField = document.getElementById('update-term');
const updateAuthorDropdown = document.getElementById('update-author-dropdown');
const updateAuthorDropmenu = document.getElementById('update-author-dropmenu');
const updateAuthorList = document.getElementById('update-author-list');
const updateAuthorsField = document.getElementById('update-authors');
const updateFileField = document.getElementById('update-file');
const updateDropzone = document.getElementById('update-dropzone');
const updateFileContainer = document.getElementById('update-file-container');

async function getDocument(id){
    const response = await fetch(
        '/get/document?id='+id,
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
        updateSpecificContainer.classList.add('hidden');
        updateSpecificField.value = '';
        updateNumberField.value = '';
        updateAreaField.value = 'null';
        updateDateField.value = '';
        updateAuthorList.innerHTML = '';
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
    fileLabelRemoveButton.classList.add('p-1','rounded-full','cursor-pointer','hover:bg-[#F5F5F5]');
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
updateCancelButton.addEventListener('click', closeUpdateModal);
updateOverlay.addEventListener('click',closeUpdateModal);
window.addEventListener('keydown', function(event){
    if(event.key == 'Escape'){
        closeUpdateModal();
    }
})

updateTypeField.addEventListener('change', function(){
    if(updateTypeField.value == 'Others'){
        updateSpecificContainer.classList.remove('hidden');
    }
    else{
        updateSpecificContainer.classList.add('hidden');
    }
});

updateDateIcon.addEventListener('click', function(){
    updateDateField.focus();
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

updateSubmitButton.addEventListener('click', function(){
    getTerm(updateTermField.value).then(term => {
        if(updateTitleField.value.length < 3){
            alert('Title should be 3 or more character long');
            return;
        }
        if(updateTypeField.value == 'null'){
            alert('Please select document type');
            return;
        }
        if(updateTypeField.value == 'Others' && updateSpecificField.value.length <= 0){
            alert('Please specify document type');
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
        let start = new Date(term['start']);
        let end = new Date(term['end']);
        let dateSelected = new Date(updateDateField.value);
        if(!(dateSelected >= start && dateSelected <= end)){
            alert('Date enacted / adopted should be within the selected administrative term duration range');
            return;
        }
        var updateAuthorOptions = document.querySelectorAll('.update-author');
        var authors = []
        for(let i = 0; i < updateAuthorOptions.length; i++){
            if(updateAuthorOptions[i].checked){
                authors.push(updateAuthorOptions[i].value);
            }
        }
        var updateCustomAuthors = document.querySelectorAll('.update-custom-author');
        for(let i = 0; i < updateCustomAuthors.length; i++){
            if(updateCustomAuthors[i].value.length >= 3){
                authors.push(updateCustomAuthors[i].value);   
            }
        }
        if(updateFileField.files.length == 0){
            alert('Please upload a file');
            return;
        }
        updateTitleField.value = updateTitleField.value.toUpperCase();
        updateAuthorsField.value = authors.join(',');
        updateForm.submit();
    });
});

function changeUpdateAuthorDropdownCounter(selected, length){
    updateAuthorDropdown.innerHTML = `Select authors (${selected} out of ${length} selected)
        <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>`;
}

function changeUpdateAuthorSelection(data){
    updateAuthorList.innerHTML = '';
    var updateSelectAllAuthorOption = document.createElement('li');
    updateSelectAllAuthorOption.innerHTML = `<div class="flex items-center p-2 rounded hover:bg-gray-100">
            <input id="update-select-all-author" type="checkbox" value="all" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1">
            <label for="update-select-all-author" class="w-full ml-2 font-sans text-sm font-normal text-gray-700 rounded cursor-pointer">Select All</label>
        </div>`;
    updateSelectAllAuthorCheckbox = updateSelectAllAuthorOption.querySelector('#update-select-all-author');
    updateSelectAllAuthorCheckbox.addEventListener('click', function(){
        var updateAuthorOptions = document.querySelectorAll('.update-author');
        if(updateSelectAllAuthorCheckbox.checked){
            for(let i = 0; i < updateAuthorOptions.length; i++){
                updateAuthorOptions[i].checked = true;
            }
            changeUpdateAuthorDropdownCounter(updateAuthorOptions.length, updateAuthorOptions.length);
        }
        else{
            for(let i = 0; i < updateAuthorOptions.length; i++){
                updateAuthorOptions[i].checked = false;
            } 
            changeUpdateAuthorDropdownCounter(0, updateAuthorOptions.length);
        }
    });
    updateAuthorList.appendChild(updateSelectAllAuthorOption);
    for(let i = 0; i < data.length; i++){
        var authorOption = document.createElement('li');
        authorOption.innerHTML = `<div class="flex items-center p-2 rounded hover:bg-gray-100">
                <input id="upload-${data[i]}" type="checkbox" value="${data[i]}" class="update-author w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1">
                <label for="upload-${data[i]}" class="w-full ml-2 font-sans text-sm font-normal text-gray-700 rounded cursor-pointer">${data[i]}</label>
            </div>`
        var currentUpdateAuthorInput = authorOption.querySelector('.update-author')
        currentUpdateAuthorInput.addEventListener('change', function(){
            var updateAuthorOptions = document.querySelectorAll('.update-author');
            var selected = 0;
            for(let i = 0; i < updateAuthorOptions.length; i++){
                if(updateAuthorOptions[i].checked){
                    selected++;
                }
            }
            changeUpdateAuthorDropdownCounter(selected, updateAuthorOptions.length);
        });
        updateAuthorList.appendChild(authorOption);
    }
    updateAddAuthorButton = document.createElement('button');
    updateAddAuthorButton.classList.add('w-full','flex','p-2','rounded','hover:bg-gray-100','rounded-md','font-sans','font-normal','text-sm','text-gray-700','justify-center');
    updateAddAuthorButton.innerHTML = '+ Add Other Author';
    updateAddAuthorButton.type = 'button';
    updateAddAuthorButton.addEventListener('click', function(){
        let updateCustomAuthorOption = document.createElement('li');
        updateCustomAuthorOption.innerHTML = `<div class="flex flex-col mt-4">
                <input type="text" id="update-custom-author" placeholder="Enter author's name" class="update-custom-author w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                <label for="update-custom-author" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                    Author Name
                </label>
            </div>`;
        updateAuthorList.appendChild(updateCustomAuthorOption);
    })
    updateAuthorList.appendChild(updateAddAuthorButton);
}

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

for(let i = 0; i < updateButtons.length; i++){
    updateButtons[i].addEventListener('click', function(){
        var id = this.getAttribute('data-id');
        getDocument(id).then(data => {
            updateTermField.value = data['term'];   
            getAuthors(data['term']).then(authors => {
                changeUpdateAuthorSelection(authors);
                changeUpdateAuthorDropdownCounter(data['authors'].length, authors.length);
                var updateAuthorOptions = document.querySelectorAll('.update-author');
                for(let i = 0; i < updateAuthorOptions.length; i++){
                    if(data['authors'].includes(updateAuthorOptions[i].value)){
                        updateAuthorOptions[i].checked = true;
                    }
                }
            });
            var types = ['Code of Ordinance','Ordinance','Resolution'];
            updateIdField.value = data['id'];
            updateTitleField.value = data['title'];
            if(!types.includes(data['type'])){
                updateTypeField.value = 'Others';
                updateSpecificContainer.classList.remove('hidden');
                updateSpecificField.value = data['type'];
            }
            else{
                updateTypeField.value = data['type'];
            }
            updateNumberField.value = data['number'];
            updateAreaField.value = data['area'];
            let date = new Date(data['date']);
            updateDateField.value = `${(date.getMonth()+1)}`.padStart(2,'0')+'/'+`${date.getDate()}`.padStart(2,'0')+'/'+date.getFullYear();
            loadURLToInputField('/storage/'+data['file'],data['file'].substring(10));
            showFileLabel(data['file'].substring(10));
        });
        openUpdateModal();
    });
}