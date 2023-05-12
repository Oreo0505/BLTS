<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/flowbite.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Homepage</title>
</head>
<body>

    {{-- Navigation Bar --}}
    <nav class="flex flex-row h-10 bg-[#425B71] justify-between items-center sticky top-0 z-20 px-4">
        <svg id="open-drawer" width="48" height="48" class="flex h-10 cursor-pointer hover:stroke-neutral-500 hover:fill-neutral-500" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 30H33V28H15V30ZM15 25H33V23H15V25ZM15 18V20H33V18H15Z" fill="white"/>
        </svg>
        <p id="time-counter" class="my-auto font-sans font-medium text-xl text-white">May 10, 2023 | 11:00 AM</p>
    </nav>

    {{-- Category Drawer --}}
    <div id="drawer" class="hidden fixed top-0 left-0 z-40 h-screen w-80 p-6 bg-[#363636] overflow-y-auto transition-transform -transform-x-full ease-in-out">
        <div class="flex flex-col">
            <div id="close-drawer" class="group flex flex-row shrink self-end items-center space-x-2">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-[#90CAF9] group-hover:fill-white/70">
                    <path d="M19 19V15C19 14.1667 18.7083 13.4583 18.125 12.875C17.5417 12.2917 16.8333 12 16 12H6.8L10.4 15.6L9 17L3 11L9 5L10.4 6.4L6.8 10H16C17.3833 10 18.5625 10.4875 19.5375 11.4625C20.5125 12.4375 21 13.6167 21 15V19H19Z"/>
                </svg>                
                <p class="text-sm font-medium text-[#90CAF9] font-sans cursor-pointer group-hover:text-white/70">CLOSE</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 mb-2 hover:bg-[#508DB9]/10">
                <img src="{{ asset('/images/folder.svg') }}" alt="" class="h-4 w-4">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">All</p>
            </div>
            <div class="flex justify-start">
                <p class="font-sans text-sm font-medium text-[#90CAF9]">BROWSE BY...</p>
            </div>
            <div class="flex flex-row h-12 justify-start items-center space-x-2 py-4">
                <img src="{{ asset('/images/folder.svg') }}" alt="" class="h-4 w-4">
                <p class="font-sans text-sm font-base text-[#90CAF9]">Document Type</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">Code of Ordinance</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">Endorsement</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">Ordinance</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">Petiton</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">Proposal</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">Resolution</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">Others</p>
            </div>
            <div class="flex flex-row h-12 justify-start items-center space-x-2 py-4">
                <img src="{{ asset('/images/folder.svg') }}" alt="" class="h-4 w-4">
                <p class="font-sans text-sm font-base text-[#90CAF9]">Status</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">Submitted</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">Endorsed</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">Adopted</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">Enacted</p>
            </div>
        </div>
    </div>

    {{-- Filter Modal --}}
    <div id="filter-overlay" class="hidden fixed w-full h-100 inset-0 z-10 overflow-hidden flex justify-center items-center brightness-50 backdrop-blur-sm animated faster">
    </div>
    <div id="filter" class="hidden fixed inset-0 flex flex-col space-y-6 border drop-shadow-md shadow-lg modal-container bg-white h-96 w-1/2 mx-auto my-auto rounded z-50 overflow-y-auto p-6 animated faster">
        <div id="hide-filter" class="group flex flex-row space-x-2 justify-start items-center h-9 shrink">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-black group-hover:fill-gray-700">
                <path d="M19 19V15C19 14.1667 18.7083 13.4583 18.125 12.875C17.5417 12.2917 16.8333 12 16 12H6.8L10.4 15.6L9 17L3 11L9 5L10.4 6.4L6.8 10H16C17.3833 10 18.5625 10.4875 19.5375 11.4625C20.5125 12.4375 21 13.6167 21 15V19H19Z"/>
            </svg>                
            <p class="text-sm font-medium text-black font-sans cursor-pointer group-hover:text-gray-700">CLOSE</p> 
        </div>
        <div class="flex flex-row justify-between md:pr-12">
            <div class="flex flex-col items-center relative w-2/5">
                <select name="filter-searchBy" id="filter-searchBy" class="type peer h-full w-full rounded-[7px] border border-gray-700 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-700 placeholder-shown:border-t-gray-700 empty:!bg-red-500 focus:border-2 focus:border-gray-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-gray-700">
                    <option value="title" class="text-sm">Title</option>
                    <option value="author" class="text-sm">Author</option>
                    <option value="tag" class="text-sm">Tags</option>
                </select>
                <label class="before:content[\' \'] after:content[\' \'] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-700 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-700 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-700 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-gray-700">
                    Search by...
                </label>
            </div>
            <div class="flex flex-col items-center relative w-2/5">
                <select name="filter-year" id="filter-year" class="type peer h-full w-full rounded-[7px] border border-gray-700 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-700 placeholder-shown:border-t-gray-700 empty:!bg-red-500 focus:border-2 focus:border-gray-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-gray-700">
                    <option value="all" class="text-sm">All Year</option>
                    <option value="2018" class="text-sm">2018</option>
                    <option value="2019" class="text-sm">2019</option>
                    <option value="2020" class="text-sm">2020</option>
                    <option value="2021" class="text-sm">2021</option>
                    <option value="2022" class="text-sm">2022</option>
                    <option value="2023" class="text-sm">2023</option>
                </select>
                <label class="before:content[\' \'] after:content[\' \'] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-700 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-700 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-700 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-gray-700">
                    Year
                </label>
            </div>
        </div>
        <div class="flex flex-col space-y-2">
            <div class="flex flex-row shrink space-x-2">
                <img src="{{ asset('/images/folder.svg') }}" alt="" class="h-4 w-4">
                <p class="font-sans text-sm font-base">Status</p>
            </div>
            <div class="flex flex-wrap md:flex-row">
                <div class="flex flex-row items-center w-[23%] mr-7">
                    <input type="checkbox" id="filter-submitted" name="filter-submitted" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="submitted" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Submitted</label>
                </div>
                <div class="flex flex-row items-center w-[23%] mr-1">
                    <input type="checkbox" id="filter-endorsed" name="filter-endorsed" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="endorsed" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Endorsed</label>
                </div>
                <div class="flex flex-row items-center w-[23%] mr-1">
                    <input type="checkbox" id="filter-enacted" name="filter-enacted" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="enacted" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Enacted</label>
                </div>
                <div class="flex flex-row items-center w-[23%]">
                    <input type="checkbox" id="filter-adopted" name="filter-adopted" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="adopted" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Adopted</label>
                </div>
            </div>
        </div>
        <div class="flex flex-col space-y-2">
            <div class="flex flex-row shrink space-x-2">
                <img src="{{ asset('/images/folder.svg') }}" alt="" class="h-4 w-4">
                <p class="font-sans text-sm font-base">Document Type</p>
            </div>
            <div class="flex flex-wrap md:flex-row">
                <div class="flex flex-row items-center w-[23%] mr-7">
                    <input type="checkbox" id="filter-code_of_ordinance" name="filter-code_of_ordinance" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="code_of_ordinance" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Code of Ordinance</label>
                </div>
                <div class="flex flex-row items-center w-[23%] mr-1">
                    <input type="checkbox" id="filter-endorsement" name="filter-endorsement" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="endorsement" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Endorsement</label>
                </div>
                <div class="flex flex-row items-center w-[23%] mr-1">
                    <input type="checkbox" id="filter-ordinance" name="filter-ordinance" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="ordinance" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Ordinance</label>
                </div>
                <div class="flex flex-row items-center w-[23%]">
                    <input type="checkbox" id="filter-petition" name="filter-petition" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="petition" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Petition</label>
                </div>
            </div>
            <div class="flex flex-wrap md:flex-row">
                <div class="flex flex-row items-center w-[23%] mr-7">
                    <input type="checkbox" id="filter-proposal" name="filter-proposal" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="proposal" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Proposal</label>
                </div>
                <div class="flex flex-row items-center w-[23%] mr-1">
                    <input type="checkbox" id="filter-resolution" name="filter-resolution" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="resolution" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Resolution</label>
                </div>
                <div class="flex flex-row items-center w-[23%] mr-1">
                    <input type="checkbox" id="filter-others" name="filter-others" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="others" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Others</label>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center">
            <button id="apply-filter" class="w-20 h-10 bg-blue-500 hover:bg-blue-700 text-white text-sm font-normal font-sans py-2 px-4 rounded-full">
                Apply
            </button>
        </div>
    </div>

    {{-- Upload Modal --}}
    <div id="upload-overlay" class="hidden fixed w-full h-100 inset-0 z-10 overflow-hidden flex justify-center items-center brightness-50 backdrop-blur-sm animated faster">
    </div>
    <div id="upload" class="hidden fixed inset-0 flex flex-col items-center border drop-shadow-md shadow-lg modal-container bg-white h-[490px] w-1/2 mx-auto my-auto rounded z-50 animated faster md:h-[390px]">
        <div class="flex flex-col self-end items-end ml-9 mr-2.5 mt-2.5">
            <svg id="upload-exit" width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" class="flex justify-end fill-[#757575] cursor-pointer">
                <path d="M4 11.875L3.125 11L6.625 7.5L3.125 4L4 3.125L7.5 6.625L11 3.125L11.875 4L8.375 7.5L11.875 11L11 11.875L7.5 8.375L4 11.875Z"/>
            </svg>
        </div>
        <p class="flex self-center font-sans font-bold text-lg text-[#131B21] ml-9 mb-2 md:self-start">Upload a Document</p>
        <form action="/upload" method="POST" enctype="multipart/form-data" id="upload-form">
            <div class="flex flex-col space-y-4 items-center mb-5 md:flex-row md:space-x-4 md:ml-9 md:mr-9 md:mt-3 md:items-end">
                <div class="flex flex-col w-3/5 space-y-4">
                    <div class="flex flex-col items-center relative">
                        <input type="text" id="upload-title" name="upload-title" class="type peer h-full w-full rounded-[7px] border border-gray-700 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-700 placeholder-shown:border-t-gray-700 focus:border-2 focus:border-gray-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-gray-700">
                        <label class="before:content[\' \'] after:content[\' \'] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-700 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-700 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-700 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-gray-700">
                            Title
                        </label>
                    </div>
                    <div class="flex flex-row space-x-2">
                        <div class="flex flex-col items-center relative w-1/2">
                            <select id="upload-type" name="upload-type" class="type peer h-full w-full rounded-[7px] border border-gray-700 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-700 placeholder-shown:border-t-gray-700 focus:border-2 focus:border-gray-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-gray-700">
                                <option value="null" class="text-sm">Select document type</option>
                                <option value="code_of_ordinance" class="text-sm">Code of Ordinance</option>
                                <option value="endorsement" class="text-sm">Endorsement</option>
                                <option value="ordinance" class="text-sm">Ordinance</option>    
                                <option value="petition" class="text-sm">Petition</option>    
                                <option value="proposal" class="text-sm">Proposal</option>    
                                <option value="resolution" class="text-sm">resolution</option>    
                                <option value="others" class="text-sm">Others</option>    
                            </select>
                            <label class="before:content[\' \'] after:content[\' \'] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-700 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-700 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-700 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-gray-700">
                                Type of Document
                            </label>
                        </div>
                        <div class="flex flex-col items-center relative w-1/2">
                            <input type="text" id="upload-number" name="upload-number" class="type peer h-full w-full rounded-[7px] border border-gray-700 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-700 placeholder-shown:border-t-gray-700 focus:border-2 focus:border-gray-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-gray-700">
                            <label class="before:content[\' \'] after:content[\' \'] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-700 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-700 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-700 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-gray-700">
                                Number
                            </label>
                        </div>
                    </div>
                    <div class="flex flex-row space-x-2">
                        <div class="flex flex-col items-center relative w-1/2">
                            <select id="upload-action" name="upload-action" class="type peer h-full w-full rounded-[7px] border border-gray-700 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-700 placeholder-shown:border-t-gray-700 focus:border-2 focus:border-gray-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-gray-700">
                                <option value="null" class="text-sm">Select action taken</option>
                                <option value="submitted" class="text-sm">Submitted</option>
                                <option value="endorsed" class="text-sm">Endorsed</option>
                                <option value="enacted" class="text-sm">Enacted</option>    
                                <option value="adopted" class="text-sm">Adopted</option>  
                            </select>
                            <label class="before:content[\' \'] after:content[\' \'] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-700 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-700 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-700 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-gray-700">
                                Action Taken
                            </label>
                        </div>
                        <div class="relative w-1/2">
                            <input datepicker datepicker-autohide type="text" id="upload-date" name="upload-date" class="bg-gray-50 border border-gray-700 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-4 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center relative">
                        <input type="text" id="upload-author" name="upload-author" class="type peer h-full w-full rounded-[7px] border border-gray-700 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-700 placeholder-shown:border-t-gray-700 focus:border-2 focus:border-gray-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-gray-700">
                        <label class="before:content[\' \'] after:content[\' \'] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-700 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-700 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-700 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-gray-700">
                            Author/s
                        </label>
                    </div>
                    <div class="flex flex-col items-center relative">
                        <input type="text" id="upload-sponsor" name="upload-sponsor" class="type peer h-full w-full rounded-[7px] border border-gray-700 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-700 placeholder-shown:border-t-gray-700 focus:border-2 focus:border-gray-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-gray-700">
                        <label class="before:content[\' \'] after:content[\' \'] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-700 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-700 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-700 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-gray-700">
                            Sponsor/s
                        </label>
                    </div>
                </div>
                <div id="upload-file-container" class="flex flex-col w-4/5 justify-end items-end md:flex-col-reverse md:w-2/5">
                    <div id="dropzone" class="flex flex-col space-y-2 h-24 w-11/12 justify-center items-center border-2 border-gray-300 border-dashed rounded-lg cursor-pointer mt-3 px-2 py-2 md:h-1/2">
                        <img src="{{ asset('/images/upload_file.svg') }}" alt="" class="h-8 w-8 md:h-16 md:w-16">
                        <p class="font-sans font-normal text-sm text-black/50 whitespace-normal text-center">
                            Click here to upload file (maximum of 1 file)
                        </p>
                    </div>
                    <input type="file" accept="application/pdf" id="upload-file" name="upload-file" class="hidden"> 
                </div>
            </div> 
        </form>
        <div class="flex flex-row items-end w-full bg-[#D9D9D9] justify-end items-center space-x-2 p-2">
            <button id="upload-cancel" class="flex bg-transparent rounded-md font-sans font-normal text-sm text-[#7575757] px-4 py-1 hover:underline">Cancel</button>
            <button id="upload-submit" class="flex bg-[#0288D1] rounded-md font-sans font-normal text-sm text-white px-4 py-1 hover:bg-[#086192] hover:text-gray-50">Submit</button>
        </div>
    </div>

    {{-- Upload FAB --}}
    <button id="upload-fab" title="Upload" class="fixed z-90 bottom-10 right-8 bg-[#425B71] w-[72px] h-[72px] overflow-clip rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-[#346A90] hover:drop-shadow-2xl">
        <img src="{{ asset('/images/upload.svg') }}" alt="" class="h-9 w-9 translate-x-[18px]">
        <svg width="68" height="44" viewBox="0 0 68 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="scale-150 translate-x-1 translate-y-3">
            <path d="M80 7.22399V49C80 52.866 77.3303 56 74.0371 56H0C3.63886 24.3779 26.7231 0 54.6576 0C63.7941 0 72.4118 2.60782 80 7.22399Z" fill="#797979" fill-opacity="0.34"/>
        </svg>
    </button>

    {{-- Hero --}}
    <div id="hero" class="h-48">
        <img src="{{ asset('images/hero.svg') }}" alt="" class="mt-4 mx-auto">
    </div>

    {{-- Search --}}
    <div class="flex flex-col items-center justify-center mt-6">
        <div class="w-2/3 flex items-center relative md:w-1/2">
            <img src="/images/search.svg" class="absolute start-0 h-8 ml-6" alt="Search Icon" />
            <input id="search" name="search" placeholder="Search something..." class="h-12 w-full border border-gray-400 rounded-full px-16 py-4 text-base text-[#4F4545] focus:outline-gray-400"/>
            <img src="/images/filter.svg" id="show-filter" class="absolute end-0 h-6 mr-6 cursor-pointer" alt="Filter Icon" />
        </div>
    </div>

    {{-- Recent Upload Titleholder --}}
    <div class="div flex flex-row mt-9 justify-between items-center">
        <p class="mx-auto text-xl text-[#181313] font-bold font-sans md:ml-60">Recent Uploads</p>
    </div>

    {{-- Document Cards --}}
    <div class="flex flex-col space-y-2 items-center py-4">
        <div class="flex-flex-col space-y-1 w-[65%] border-b drop-shadow-md shadow-lg p-4">
            <div class="flex flex-col justify-between space-y-2 md:flex-row">
                <div class="flex flex-row space-x-4 items-end">
                    <img src="{{ asset('/images/approved.svg') }}" alt="" class="w-9">
                    <p class="font-sans font-medium text-base text-left w-[210px]">Ordinance No.10, s. 2021</p>
                </div>
                <div class="flex flex-row space-x-4 items-end justify-center md:justify-end">
                    <a href="#" class="h-9 bg-[#9C27B0] rounded-full px-4 py-2 font-sans font-normal text-sm text-white whitespace-nowrap">Waste Sched</a>
                    <a href="#" class="h-9 bg-[#0288D1] rounded-full px-4 py-2 font-sans font-normal text-sm text-white whitespace-nowrap">Kalikasan</a>
                    <a href="#" class="h-9 bg-[#2E7D32] rounded-full px-4 py-2 font-sans font-normal text-sm text-white whitespace-nowrap">Solid Waste</a>
                </div>
            </div>
            <p class="text-base font-normal uppercase text-black/60">
                AN ORDINANCE DECLARING DECEMBER 20, 2029 AND EVERT YEAR THEREATER AS THE ARAW NG BARANGAY CELEBRATION IN BARANGAY TAMPUS, BOAC, MARINDUQUE AND PROVIDING FUNDS FOR THIS PURPOSE
            </p>
            <div class="flex flex-col">
                <p class="text-base font-bold text-black/60">
                    Sponsor | Hon. Clarence S. Madrigal
                </p>
                <div class="flex flex-col items-end md:flex-row md:justify-between">
                    <p class="text-base font-bold text-black/60">
                        Co-Sponsor | Hon. Jepthe M. Laderas & Hon. Arrianne R. Umali
                    </p>
                    <div class="flex flex-row justify-end items-end space-x-4">
                        <a href="/test" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                            <img src="{{ asset('/images/download.svg') }}" alt="">
                        </a>
                        <a href="#" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                            <img src="{{ asset('/images/open.svg') }}" alt="">
                        </a>
                        <a href="#" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                            <img src="{{ asset('/images/delete.svg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col space-y-2 items-center py-4">
        <div class="flex-flex-col space-y-1 w-[65%] border-b drop-shadow-md shadow-lg p-4">
            <div class="flex flex-col justify-between space-y-2 md:flex-row">
                <div class="flex flex-row space-x-4 items-end">
                    <img src="{{ asset('/images/approved.svg') }}" alt="" class="w-9">
                    <p class="font-sans font-medium text-base text-left w-[210px]">Ordinance No.10, s. 2021</p>
                </div>
                <div class="flex flex-row space-x-4 items-end justify-center md:justify-end">
                    <a href="#" class="h-9 bg-[#9C27B0] rounded-full px-4 py-2 font-sans font-normal text-sm text-white whitespace-nowrap">Waste Sched</a>
                    <a href="#" class="h-9 bg-[#0288D1] rounded-full px-4 py-2 font-sans font-normal text-sm text-white whitespace-nowrap">Kalikasan</a>
                    <a href="#" class="h-9 bg-[#2E7D32] rounded-full px-4 py-2 font-sans font-normal text-sm text-white whitespace-nowrap">Solid Waste</a>
                </div>
            </div>
            <p class="text-base font-normal uppercase text-black/60">
                AN ORDINANCE DECLARING DECEMBER 20, 2029 AND EVERT YEAR THEREATER AS THE ARAW NG BARANGAY CELEBRATION IN BARANGAY TAMPUS, BOAC, MARINDUQUE AND PROVIDING FUNDS FOR THIS PURPOSE
            </p>
            <div class="flex flex-col">
                <p class="text-base font-bold text-black/60">
                    Sponsor | Hon. Clarence S. Madrigal
                </p>
                <div class="flex flex-col items-end md:flex-row md:justify-between">
                    <p class="text-base font-bold text-black/60">
                        Co-Sponsor | Hon. Jepthe M. Laderas & Hon. Arrianne R. Umali
                    </p>
                    <div class="flex flex-row justify-end items-end space-x-4">
                        <a href="#" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                            <img src="{{ asset('/images/download.svg') }}" alt="">
                        </a>
                        <a href="#" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                            <img src="{{ asset('/images/open.svg') }}" alt="">
                        </a>
                        <a href="#" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                            <img src="{{ asset('/images/delete.svg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col space-y-2 items-center py-4">
        <div class="flex-flex-col space-y-1 w-[65%] border-b drop-shadow-md shadow-lg p-4">
            <div class="flex flex-col justify-between space-y-2 md:flex-row">
                <div class="flex flex-row space-x-4 items-end">
                    <img src="{{ asset('/images/approved.svg') }}" alt="" class="w-9">
                    <p class="font-sans font-medium text-base text-left w-[210px]">Ordinance No.10, s. 2021</p>
                </div>
                <div class="flex flex-row space-x-4 items-end justify-center md:justify-end">
                    <a href="#" class="h-9 bg-[#9C27B0] rounded-full px-4 py-2 font-sans font-normal text-sm text-white whitespace-nowrap">Waste Sched</a>
                    <a href="#" class="h-9 bg-[#0288D1] rounded-full px-4 py-2 font-sans font-normal text-sm text-white whitespace-nowrap">Kalikasan</a>
                    <a href="#" class="h-9 bg-[#2E7D32] rounded-full px-4 py-2 font-sans font-normal text-sm text-white whitespace-nowrap">Solid Waste</a>
                </div>
            </div>
            <p class="text-base font-normal uppercase text-black/60">
                AN ORDINANCE DECLARING DECEMBER 20, 2029 AND EVERT YEAR THEREATER AS THE ARAW NG BARANGAY CELEBRATION IN BARANGAY TAMPUS, BOAC, MARINDUQUE AND PROVIDING FUNDS FOR THIS PURPOSE
            </p>
            <div class="flex flex-col">
                <p class="text-base font-bold text-black/60">
                    Sponsor | Hon. Clarence S. Madrigal
                </p>
                <div class="flex flex-col items-end md:flex-row md:justify-between">
                    <p class="text-base font-bold text-black/60">
                        Co-Sponsor | Hon. Jepthe M. Laderas & Hon. Arrianne R. Umali
                    </p>
                    <div class="flex flex-row justify-end items-end space-x-4">
                        <a href="#" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                            <img src="{{ asset('/images/download.svg') }}" alt="">
                        </a>
                        <a href="#" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                            <img src="{{ asset('/images/open.svg') }}" alt="">
                        </a>
                        <a href="#" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                            <img src="{{ asset('/images/delete.svg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col space-y-2 items-center py-4">
        <div class="flex-flex-col space-y-1 w-[65%] border-b drop-shadow-md shadow-lg p-4">
            <div class="flex flex-col justify-between space-y-2 md:flex-row">
                <div class="flex flex-row space-x-4 items-end">
                    <img src="{{ asset('/images/approved.svg') }}" alt="" class="w-9">
                    <p class="font-sans font-medium text-base text-left w-[210px]">Ordinance No.10, s. 2021</p>
                </div>
                <div class="flex flex-row space-x-4 items-end justify-center md:justify-end">
                    <a href="#" class="h-9 bg-[#9C27B0] rounded-full px-4 py-2 font-sans font-normal text-sm text-white whitespace-nowrap">Waste Sched</a>
                    <a href="#" class="h-9 bg-[#0288D1] rounded-full px-4 py-2 font-sans font-normal text-sm text-white whitespace-nowrap">Kalikasan</a>
                    <a href="#" class="h-9 bg-[#2E7D32] rounded-full px-4 py-2 font-sans font-normal text-sm text-white whitespace-nowrap">Solid Waste</a>
                </div>
            </div>
            <p class="text-base font-normal uppercase text-black/60">
                AN ORDINANCE DECLARING DECEMBER 20, 2029 AND EVERT YEAR THEREATER AS THE ARAW NG BARANGAY CELEBRATION IN BARANGAY TAMPUS, BOAC, MARINDUQUE AND PROVIDING FUNDS FOR THIS PURPOSE
            </p>
            <div class="flex flex-col">
                <p class="text-base font-bold text-black/60">
                    Sponsor | Hon. Clarence S. Madrigal
                </p>
                <div class="flex flex-col items-end md:flex-row md:justify-between">
                    <p class="text-base font-bold text-black/60">
                        Co-Sponsor | Hon. Jepthe M. Laderas & Hon. Arrianne R. Umali
                    </p>
                    <div class="flex flex-row justify-end items-end space-x-4">
                        <a href="#" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                            <img src="{{ asset('/images/download.svg') }}" alt="">
                        </a>
                        <a href="#" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                            <img src="{{ asset('/images/open.svg') }}" alt="">
                        </a>
                        <a href="#" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                            <img src="{{ asset('/images/delete.svg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col space-y-2 items-center py-4">
        <div class="flex-flex-col space-y-1 w-[65%] border-b drop-shadow-md shadow-lg p-4">
            <div class="flex flex-col justify-between space-y-2 md:flex-row">
                <div class="flex flex-row space-x-4 items-end">
                    <img src="{{ asset('/images/approved.svg') }}" alt="" class="w-9">
                    <p class="font-sans font-medium text-base text-left w-[210px]">Ordinance No.10, s. 2021</p>
                </div>
                <div class="flex flex-row space-x-4 items-end justify-center md:justify-end">
                    <a href="#" class="h-9 bg-[#9C27B0] rounded-full px-4 py-2 font-sans font-normal text-sm text-white whitespace-nowrap">Waste Sched</a>
                    <a href="#" class="h-9 bg-[#0288D1] rounded-full px-4 py-2 font-sans font-normal text-sm text-white whitespace-nowrap">Kalikasan</a>
                    <a href="#" class="h-9 bg-[#2E7D32] rounded-full px-4 py-2 font-sans font-normal text-sm text-white whitespace-nowrap">Solid Waste</a>
                </div>
            </div>
            <p class="text-base font-normal uppercase text-black/60">
                AN ORDINANCE DECLARING DECEMBER 20, 2029 AND EVERT YEAR THEREATER AS THE ARAW NG BARANGAY CELEBRATION IN BARANGAY TAMPUS, BOAC, MARINDUQUE AND PROVIDING FUNDS FOR THIS PURPOSE
            </p>
            <div class="flex flex-col">
                <p class="text-base font-bold text-black/60">
                    Sponsor | Hon. Clarence S. Madrigal
                </p>
                <div class="flex flex-col items-end md:flex-row md:justify-between">
                    <p class="text-base font-bold text-black/60">
                        Co-Sponsor | Hon. Jepthe M. Laderas & Hon. Arrianne R. Umali
                    </p>
                    <div class="flex flex-row justify-end items-end space-x-4">
                        <a href="#" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                            <img src="{{ asset('/images/download.svg') }}" alt="">
                        </a>
                        <a href="#" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                            <img src="{{ asset('/images/open.svg') }}" alt="">
                        </a>
                        <a href="#" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                            <img src="{{ asset('/images/delete.svg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/datepicker.js') }}"></script>
    <script src="{{ asset('/js/datetime_counter.js') }}"></script>
    <script src="{{ asset('/js/drawer.js') }}"></script>
    <script src="{{ asset('/js/filter_search.js') }}"></script>
    <script src="{{ asset('/js/upload.js') }}"></script>
    <script>
    </script>
</body>
</html>