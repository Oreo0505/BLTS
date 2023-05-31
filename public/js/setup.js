const boac_barangays = [
    'Agot',
    'Agumaymayan',
    'Amoingon',
    'Apitong',
    'Balagasan',
    'Balaring',
    'Balimbing',
    'Balogo',
    'Bamban',
    'Bangbangalon',
    'Bantad',
    'Bantay',
    'Bayuti',
    'Binunga',
    'Boi',
    'Boton',
    'Buliasnin',
    'Bunganay',
    'Caganhao',
    'Canat',
    'Catubugan',
    'Cawit',
    'Daig',
    'Daypay',
    'Duyay',
    'Hinapulan',
    'Ihatub',
    'Isok I',
    'Ison II Poblacion',
    'Laylay',
    'Lupac',
    'Mahinhin',
    'Mainit',
    'Malbog',
    'Maligaya',
    'Malusak',
    'Mansiwat',
    'Mataas na Bayan',
    'Maybo',
    'Mercado',
    'Murallon',
    'Ogbac',
    'Pawa',
    'Pili',
    'Poctoy',
    'Poras',
    'Puting Buhangin',
    'Puyog',
    'Sabong',
    'San Miguel',
    'Santol',
    'Sawi',
    'Tabi',
    'Tabigue',
    'Tagwak',
    'Tambunan',
    'Tampus',
    'Tanza',
    'Tugos',
    'Tumagabok',
    'Tumapon'
];
const buenavista_barangays = [
    'Bagacay',
    'Bagtingon',
    'Barangay I',
    'Barangay II',
    'Barangay III',
    'Barangay IV',
    'Bicas-bicas',
    'Caigangan',
    'Daykitin',
    'Libas',
    'Malbog',
    'Sihi',
    'Timbo',
    'Tungib-Lipata',
    'Yook' 
];
const gasan_barangays = [
    'Antipolo',
    'Bachao Ibaba',
    'Bachao Ilaya',
    'Bacongbacong',
    'Bahi',
    'Bangbang',
    'Banot',
    'Banuyo',
    'Barangay I',
    'Barangay II',
    'Barangay III',
    'Bognuyan',
    'Cabugao',
    'Dawis',
    'Dili',
    'Libtangin',
    'Mahunig',
    'Mangiliol',
    'Masiga',
    'Matandang Gasan',
    'Pangi',
    'Pinggan',
    'Tabionan',
    'Tapuyan',
    'Tiguion'
];
const mogpog_barangays = [
    'Anapog-Sibucao',
    'Argao',
    'Balanacan',
    'Banto',
    'Bintakay',
    'Bocboc',
    'Butansapa',
    'Candahon',
    'Capayang',
    'Danao',
    'Dulong Bayan',
    'Gitnang Bayan',
    'Guisian',
    'Hinadharan',
    'Hinanggayon',
    'Ino',
    'Janagdong',
    'Lamesa',
    'Laon',
    'Magapua',
    'Malayak',
    'Malusak',
    'Mampaitan',
    'Mangyan-Mababad',
    'Market Site',
    'Mataas na Bayan',
    'Mendez',
    'Nangka I',
    'Nangka II',
    'Paye',
    'Pili',
    'Puting Buhangin',
    'Sayao',
    'Silangan',
    'Sumangga',
    'Tarug',
    'Villa Mendez'
];
const sta_cruz_barangays = [
    'Alobo',
    'Angas',
    'Aturan',
    'Bagon Silang Poblacion',
    'Baguidbirin',
    'Baliis',
    'Balogo',
    'Banahaw Poblacion',
    'Bangcuangan',
    'Banogbog',
    'Biga',
    'Botilao',
    'Buyabod',
    'Dating Bayan',
    'Devilla',
    'Dolores',
    'Haguimit',
    'Hupi',
    'Ipil',
    'Jolo',
    'Kaganhao',
    'Kalangkang',
    'Kamandungan',
    'Kasily',
    'Kilo-kilo',
    'Kiñaman',
    'Labo',
    'Lamesa',
    'Landy',
    'Lapu-lapu Poblacion',
    'Libjo',
    'Lipa',
    'Lusok',
    'Maharlika Poblacion',
    'Makulapnit',
    'Maniwaya',
    'Manlibunan',
    'Masaguisi',
    'Masalukot',
    'Matalaba',
    'Mongpong',
    'Morales',
    'Napo',
    'Pag-asa Poblacion',
    'Pantayin',
    'Polo',
    'Pulong-parang',
    'Punong',
    'San Antonio',
    'San Isidro',
    'Tagum',
    'Tamayo',
    'Tambangan',
    'Tawiran',
    'Taytay'
];
const torrijos_barangays = [
    'Bangwayin',
    'Bayakbakin',
    'Bolo',
    'Bonliw',
    'Buangan',
    'Cabuyo',
    'Cagpo',
    'Dampulan',
    'Kay Duke',
    'Mabuhay',
    'Makawayan',
    'Malibago',
    'Malinao',
    'Maranlig',
    'Marlangga',
    'Matuyatuya',
    'Nangka',
    'Pakaskasan',
    'Payanas',
    'Poblacion',
    'Poctoy',
    'Sibuyao',
    'Suha',
    'Talawan',
    'Tigwi'
];

const municipalityDropdown = document.getElementById('municipality');
const barangayDropdown = document.getElementById('barangay');
const fromDateField = document.getElementById('from');
const toDateField = document.getElementById('to');
const fromDateIcon = document.getElementById('from-date-icon');
const toDateIcon = document.getElementById('to-date-icon');
const uploadButton = document.getElementById('upload-button');
const logoField = document.getElementById('logo');
const captainField = document.getElementById('captain');
const secretaryField = document.getElementById('secretary');
const sbFields = document.querySelectorAll('.sb-member');
const chairmanField = document.getElementById('chairman');
const setupButton = document.getElementById('setup-button');
const setupForm = document.getElementById('setup-form');

function addOptions(select, list){
    select.innerHTML = '';
    var nullOption = document.createElement('option');
    nullOption.value = 'null';
    nullOption.innerHTML = 'Select Barangay...'
    select.appendChild(nullOption);
    for(let i = 0; i < list.length; i++){
        var option = document.createElement('option');
        option.value = list[i];
        option.innerHTML = list[i];
        select.appendChild(option);
    }
}

municipalityDropdown.addEventListener('change', function(){
    var value = municipalityDropdown.value;
    if(value == 'null'){
        addOptions(barangayDropdown, []);
    }
    else if(value == 'Boac'){
        addOptions(barangayDropdown, boac_barangays);
    }
    else if(value == 'Buenavista'){
        addOptions(barangayDropdown, buenavista_barangays);
    }
    else if(value == 'Gasan'){
        addOptions(barangayDropdown, gasan_barangays);
    }
    else if(value == 'Mogpog'){
        addOptions(barangayDropdown, mogpog_barangays);
    }
    else if(value == 'Sta. Cruz'){
        addOptions(barangayDropdown, sta_cruz_barangays);
    }
    else if(value == 'Torrijos'){
        addOptions(barangayDropdown, torrijos_barangays);
    }
});

fromDateIcon.addEventListener('click', function(){
    fromDateField.focus();
});

toDateIcon.addEventListener('click', function(){
    toDateField.focus();
});

uploadButton.addEventListener('click', function(){
    logoField.click();
});

logoField.addEventListener('change', function(){
    console.log(logoField.value);
    if(logoField.value.length > 0){
        uploadButton.innerHTML =  `${logoField.files[0].name}
        <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-2.5 right-3 h-5 w-5">
            <path d="M5.75 42.5C4.30625 42.5 3.07031 41.9859 2.04219 40.9578C1.01406 39.9297 0.5 38.6937 0.5 37.25V29.375H5.75V37.25H37.25V29.375H42.5V37.25C42.5 38.6937 41.9859 39.9297 40.9578 40.9578C39.9297 41.9859 38.6937 42.5 37.25 42.5H5.75ZM18.875 32V10.6063L12.05 17.4313L8.375 13.625L21.5 0.5L34.625 13.625L30.95 17.4313L24.125 10.6063V32H18.875Z" fill="#6B7280"/>
        </svg>`
    }
});

setupButton.addEventListener('click', function(event){
    event.preventDefault();
    if(municipalityDropdown.value == 'null'){
        alert('Please select municipality');
        return;
    }
    if(barangayDropdown.value == 'null'){
        alert('Please select barangay');
        return;
    }
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
        alert('SK Chairman field should contain at least 3 or more characters');
        return;
    }
    setupForm.submit();
});