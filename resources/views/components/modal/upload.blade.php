<div id="upload-overlay" class="hidden fixed w-full h-100 inset-0 z-10 overflow-hidden flex justify-center items-center brightness-50 backdrop-blur-sm animated faster">
</div>
<div id="upload" class="hidden fixed inset-0 h-fit flex flex-col items-center border drop-shadow-md shadow-lg modal-container bg-white w-1/2 mx-auto my-auto rounded z-50 animated faster">
    <div class="flex flex-col self-end items-end ml-9 mr-2.5 mt-2.5">
        <svg id="upload-exit" width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" class="flex justify-end fill-[#757575] cursor-pointer">
            <path d="M4 11.875L3.125 11L6.625 7.5L3.125 4L4 3.125L7.5 6.625L11 3.125L11.875 4L8.375 7.5L11.875 11L11 11.875L7.5 8.375L4 11.875Z"/>
        </svg>
    </div>
    <p class="flex self-center font-sans font-bold text-lg text-[#131B21] ml-9 mb-2 md:self-start">Upload a Document</p>
    <form action="/upload" method="POST" enctype="multipart/form-data" id="upload-form">
        @csrf
        <div class="flex flex-col space-y-4 items-center mb-3 md:flex-row md:space-x-4 md:ml-9 md:mr-9 md:mt-3 md:items-end">
            <div class="flex flex-col w-3/5 space-y-2">
                <div class="flex flex-col relative">
                    <input type="text" id="upload-title" name="title" placeholder="Enter document title..." class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                    <label for="upload-title" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                        Document Title
                    </label>
                </div>
                <div class="flex flex-col space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                    <div class="flex flex-col relative w-full md:w-1/2">
                        <select id="upload-type" name="type" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                            <option value="null" class="text-sm">Select document type</option>
                            <option value="Code of Ordinance" class="text-sm">Code of Ordinance</option>
                            <option value="Ordinance" class="text-sm">Ordinance</option> 
                            <option value="Resolution" class="text-sm">Resolution</option>    
                            <option value="Others" class="text-sm">Others</option>    
                        </select>
                        <label for="upload-type" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                            Type of Document
                        </label>
                    </div>
                    <div class="flex flex-col relative w-full md:w-1/2">
                        <input type="text" id="upload-number" name="number" placeholder="Enter document number..." class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                        <label for="upload-number" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                            Number
                        </label>
                    </div>
                </div>
                <div class="flex flex-col space-y-2 md:flex-row md:space-x-2 md:space-y-0">
                    <div class="flex flex-col relative w-full md:w-1/2">
                        <select id="upload-area" name="area" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                            <option value="null" class="text-sm">Select area</option>
                            <option value="Financial Administration and Sustainability" class="text-sm">Financial Administration and Sustainability</option>
                            <option value="Disaster Preparedness" class="text-sm">Disaster Preparedness</option>
                            <option value="Safety, Peace and Order" class="text-sm">Safety, Peace and Order</option>    
                            <option value="Social Protection and Sensitivity" class="text-sm">Social Protection and Sensitivity</option>  
                            <option value="Business-Friendliness and Competitiveness" class="text-sm">Business-Friendliness and Competitiveness</option>  
                            <option value="Environmental Mannagement" class="text-sm">Environmental Mannagement</option>  
                        </select>
                        <label for="upload-area" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                            Governance Area
                        </label>
                    </div>
                    <div class="flex flex-col relative w-full md:w-1/2">
                        <input type="text" datepicker datepicker-autohide id="upload-date" name="date" placeholder="Enter date of enactment/endorsed..." class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                        <label for="upload-date" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                            Date
                        </label>
                        <div class="absolute inset-y-0 right-0 flex mt-2 pr-3 cursor-pointer">
                            <svg id="upload-date-icon" aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="flex flex-col relative w-full">
                        <input type="text" id="upload-authors" name="authors" class="hidden">
                        <button id="dropdownBgHoverButton" data-dropdown-toggle="dropdownBgHover" data-dropdown-placement="top" class="w-full flex justify-between border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button">
                            Select Authors
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <p class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">Author/s</p>
                        <div id="dropdownBgHover" class="z-10 hidden w-fit border border-gray-300 bg-white rounded-md shadow">
                            <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownBgHoverButton">

                                @foreach($authors as $author)
                                    <li class="">
                                        <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                            <input id="{{ $author->name }}" type="checkbox" value="{{ $author->name }}" class="upload-author w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-1">
                                            <label for="{{ $author->name }}" class="w-full ml-2 font-sans text-sm font-normal text-gray-700 rounded cursor-pointer">{{ $author->name }}</label>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="upload-file-container" class="flex flex-col w-4/5 justify-end items-center pb-3 md:flex-col-reverse md:w-2/5">
                <div id="upload-dropzone" class="flex flex-col space-y-2 h-24 w-11/12 justify-center items-center border-2 border-gray-300 border-dashed rounded-lg cursor-pointer mt-3 px-2 py-2 md:h-1/2">
                    <img src="{{ asset('/images/upload_file.svg') }}" alt="" class="h-8 w-8 md:h-16 md:w-16">
                    <p class="font-sans font-normal text-sm text-black/50 whitespace-normal text-center">
                        Click here to upload file (maximum of 1 file)
                    </p>
                </div>
                <input type="file" accept="application/pdf" id="upload-file" name="file" class="hidden"> 
            </div>
        </div> 
    </form>
    <div class="flex flex-row items-end w-full bg-[#D9D9D9] justify-end items-center space-x-2 p-2">
        <button id="upload-cancel" class="flex bg-transparent rounded-md font-sans font-normal text-sm text-[#7575757] px-4 py-1 hover:underline">Cancel</button>
        <button id="upload-submit" class="flex bg-[#0288D1] rounded-full font-sans font-normal text-sm text-white px-6 py-2 hover:bg-[#086192] hover:text-gray-50">Upload</button>
    </div>
</div>

<script src="{{ asset('/js/upload.js') }}"></script>
