<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="{{ asset('/css/styles.css') }}" rel="stylesheet"> --}}
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
    <div id="filter-overlay" class="hidden fixed w-full h-100 inset-0 z-10 overflow-hidden flex justify-center items-center backdrop-blur-sm animated faster">
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
                <select name="' + id + '-type" id="' + id + '-type" class="type peer h-full w-full rounded-[7px] border border-gray-700 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-700 placeholder-shown:border-t-gray-700 empty:!bg-red-500 focus:border-2 focus:border-gray-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-gray-700">
                    <option value="placeholder" class="text-sm">Title</option>
                    <option value="text" class="text-sm">Author</option>
                    <option value="date" class="text-sm">Tags</option>
                </select>
                <label class="before:content[\' \'] after:content[\' \'] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-700 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-700 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-700 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-gray-700">
                    Search by...
                </label>
            </div>
            <div class="flex flex-col items-center relative w-2/5">
                <select name="' + id + '-type" id="' + id + '-type" class="type peer h-full w-full rounded-[7px] border border-gray-700 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-700 placeholder-shown:border-t-gray-700 empty:!bg-red-500 focus:border-2 focus:border-gray-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-gray-700">
                    <option value="placeholder" class="text-sm">All Year</option>
                    <option value="placeholder" class="text-sm">2018</option>
                    <option value="placeholder" class="text-sm">2019</option>
                    <option value="placeholder" class="text-sm">2020</option>
                    <option value="placeholder" class="text-sm">2021</option>
                    <option value="placeholder" class="text-sm">2022</option>
                    <option value="placeholder" class="text-sm">2023</option>
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
                    <input type="checkbox" id="submitted" name="submitted" value="submitted" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="submitted" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Submitted</label>
                </div>
                <div class="flex flex-row items-center w-[23%] mr-1">
                    <input type="checkbox" id="endorsed" name="endorsed" value="" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="endorsed" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Endorsed</label>
                </div>
                <div class="flex flex-row items-center w-[23%] mr-1">
                    <input type="checkbox" id="enacted" name="enacted" value="enacted" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="enacted" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Enacted</label>
                </div>
                <div class="flex flex-row items-center w-[23%]">
                    <input type="checkbox" id="adopted" name="adopted" value="adopted" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
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
                    <input type="checkbox" id="code" name="code" value="code" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="code" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Code of Ordinance</label>
                </div>
                <div class="flex flex-row items-center w-[23%] mr-1">
                    <input type="checkbox" id="endorsement" name="endorsement" value="endorsement" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="endorsement" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Endorsement</label>
                </div>
                <div class="flex flex-row items-center w-[23%] mr-1">
                    <input type="checkbox" id="ordinance" name="ordinance" value="ordinance" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="ordinance" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Ordinance</label>
                </div>
                <div class="flex flex-row items-center w-[23%]">
                    <input type="checkbox" id="petition" name="petition" value="petition" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="petition" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Petition</label>
                </div>
            </div>
            <div class="flex flex-wrap md:flex-row">
                <div class="flex flex-row items-center w-[23%] mr-7">
                    <input type="checkbox" id="proposal" name="proposal" value="proposal" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="proposal" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Proposal</label>
                </div>
                <div class="flex flex-row items-center w-[23%] mr-1">
                    <input type="checkbox" id="resolution" name="resolution" value="resolution" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                    <label for="resolution" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Resolution</label>
                </div>
                <div class="flex flex-row items-center w-[23%] mr-1">
                    <input type="checkbox" id="others" name="others" value="others" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
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

    {{-- Upload FAB --}}
    <button title="Upload" class="fixed z-90 bottom-10 right-8 bg-[#425B71] w-[72px] h-[72px] overflow-clip rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-[#346A90] hover:drop-shadow-2xl">
        <img src="{{ asset('/images/upload.svg') }}" alt="" class="h-9 w-9 translate-x-[18px]">
        <svg width="68" height="44" viewBox="0 0 68 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="scale-150 translate-x-1 translate-y-3">
            <path d="M80 7.22399V49C80 52.866 77.3303 56 74.0371 56H0C3.63886 24.3779 26.7231 0 54.6576 0C63.7941 0 72.4118 2.60782 80 7.22399Z" fill="#797979" fill-opacity="0.34"/>
        </svg>
    </button>

    {{-- Hero --}}
    <div id="hero" class="h-48">
        <img src="{{ asset('images/hero.svg') }}" alt="" class="mt-4 mx-auto">
    </div>
    <div class="flex flex-col items-center justify-center mt-6">
        <div class="w-2/3 flex items-center relative md:w-1/2">
            <img src="/images/search.svg" class="absolute start-0 h-8 ml-6" alt="Search Icon" />
            <input placeholder="Search something..." class="h-12 w-full border border-gray-400 rounded-full px-16 py-4 text-base text-[#4F4545] focus:outline-gray-400"/>
            <img src="/images/filter.svg" id="show-filter" class="absolute end-0 h-6 mr-6 cursor-pointer" alt="Filter Icon" />
        </div>
    </div>

    {{-- Recent Upload Titleholder --}}
    <div class="div flex flex-row mt-9 justify-between items-center">
        <p class="mx-auto text-xl text-[#181313] font-bold font-sans md:ml-54">Recent Uploads</p>
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

    <script>
        const drawer = document.getElementById('drawer');
        const openDrawerButton = document.getElementById('open-drawer');
        const showFilter = document.getElementById('show-filter');
        const hideFilter = document.getElementById('hide-filter');
        const filterOverlay = document.getElementById('filter-overlay');
        const filter = document.getElementById('filter');
        const applyFilterButton = document.getElementById('apply-filter');

        function openFilterModal(){
            drawer.classList.add('hidden');
            filterOverlay.classList.remove('hidden');
            filter.classList.remove('hidden','fadeOut');
            filter.classList.add('fadeIn');
        }
        function closeFilterModal(){
            filterOverlay.classList.add('hidden');
            filter.classList.remove('fadeIn');
            filter.classList.add('fadeOut');
            setTimeout(() => {
                filter.classList.add('hidden');
            }, 1000);   
        }

        openDrawerButton.addEventListener('click', function(){
            closeFilterModal();
            drawer.classList.remove('hidden');
        });
        const closeDrawerButton = document.getElementById('close-drawer');
        closeDrawerButton.addEventListener('click', function(){
            drawer.classList.add('hidden');
        });

        showFilter.addEventListener('click', openFilterModal);
        hideFilter.addEventListener('click', closeFilterModal);
        filterOverlay.addEventListener('click', closeFilterModal);
        applyFilterButton.addEventListener('click',function(){
            // Apply filters
            closeFilterModal();
        });

        window.addEventListener('keydown', function(event){
            if(event.key == 'Escape'){
                closeFilterModal();
                drawer.classList.add('hidden');
            }
        })

        const timeCounter = document.getElementById('time-counter');
        const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        function getCurrentDateTime(){
            var date = new Date();
            var month = months[date.getMonth()];
            var day = date.getDate();
            var year = date.getFullYear();
            var hour = date.getHours();
            var minute = date.getMinutes();
            var second =String(date.getSeconds()).padStart(2,'0');
            var hourFormat = 'AM';
            console.log(hour);
            if(hour >= 12){
                hour = hour - 12;
                hourFormat = 'PM';
            }
            timeCounter.innerText= `${month} ${day}, ${year} | ${hour}:${minute}:${second} ${hourFormat}`;
        }
        setInterval(getCurrentDateTime, 1000);
    </script>
</body>
</html>