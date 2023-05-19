const sortButton = document.getElementById('sort-button');
const sortDropdown = document.getElementById('sort-dropdown');
const sortButtons = document.querySelectorAll('.sort-button');

var sortDropdownOpened = false;
function toggleSortDropdown(){
    if(!sortDropdownOpened){
        sortDropdown.classList.remove('hidden');
        sortDropdownOpened = true;
    }
    else{
        sortDropdown.classList.add('hidden');
        sortDropdownOpened = false;
    }
}

sortButton.addEventListener('click', toggleSortDropdown);
window.addEventListener('click', function(event){
    const withinDropdown = event.composedPath().includes(sortDropdown);
    const withinButton = event.composedPath().includes(sortButton);
    if(!withinDropdown && !withinButton){
        sortDropdown.classList.add('hidden');
        sortDropdownOpened = false;
    }
});

function updateUrl(url, key, value){
    if(value !== undefined){
        value = encodeURI(value);
    }
    var hashIndex = url.indexOf('#')|0;
    if(hashIndex === -1) hashIndex = url.length|0;
    var urls = url.substring(0, hashIndex).split('?');
    var baseUrl = urls[0];
    var parameters = '';
    var outPara = {};
    if(urls.length > 1){
        parameters = urls[1];
    }
    if(parameters !== ''){
        parameters = parameters.split('&');
        for(k in parameters){
            var keyVal = parameters[k];
            keyVal = keyVal.split('=');
            var ekey = keyVal[0];
            var evalue = '';
            if(keyVal.length > 1){
                evalue = keyVal[1];
            }
            outPara[ekey] = evalue;
        }
    }

    if(value !== undefined){
        outPara[key] = value;
    }
    else{
        delete outPara[key];
    }
    parameters = [];
    for(var k in outPara){
        parameters.push(k + '=' + outPara[k]);
    }

    var finalUrl = baseUrl;

    if(parameters.length > 0){
        finalUrl += '?' + parameters.join('&');
    }

    return finalUrl + url.substring(hashIndex);
}

for(let i = 0; i < sortButtons.length; i++){
    sortButtons[i].addEventListener('click', function(){
        var value = sortButtons[i].getAttribute('data-filter');
        var baseUrl = document.location.href;
        console.log(baseUrl);
        var url = updateUrl(baseUrl, 'filter', value);
        window.open(url, '_self');
    });
}