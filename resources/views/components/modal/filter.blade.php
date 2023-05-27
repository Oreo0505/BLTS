<div id="filter-overlay" class="hidden fixed w-full h-100 inset-0 z-10 overflow-hidden flex justify-center items-center brightness-50 backdrop-blur-sm animated faster">
</div>
<div id="filter" class="hidden fixed inset-0 h-fit w-2/3 flex flex-col border drop-shadow-md shadow-lg modal-container bg-white mx-auto my-auto rounded z-50 overflow-y-auto animated faster md:w-1/2">
    <div class="flex flex-col self-end items-end ml-9 mr-2.5 mt-2.5">
        <svg id="hide-filter" width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" class="flex justify-end fill-[#757575] cursor-pointer">
            <path d="M4 11.875L3.125 11L6.625 7.5L3.125 4L4 3.125L7.5 6.625L11 3.125L11.875 4L8.375 7.5L11.875 11L11 11.875L7.5 8.375L4 11.875Z"/>
        </svg>
    </div>
    <p class="flex self-center font-sans font-medium text-xl text-black/90 ml-7 mb-2 md:self-start">Select Filter</p>
    <div class="flex flex-col space-y-3 items-center mx-6 mt-6 md:justify-between md:flex-row md:space-x-2 md:space-y-0">
        <div class="flex flex-col relative w-2/3 md:w-1/3">
            <select id="filter-year" name="year" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                <option value="all" class="text-sm">All Terms</option>

                @foreach($terms as $term)
                    <option value="{{date('Y', strtotime($term->start))}}-{{date('Y', strtotime($term->end))}}" class="text-sm">{{date('Y', strtotime($term->start))}}-{{date('Y', strtotime($term->end))}}</option>
                @endforeach

                <option value="older" class="text-sm">Older Terms</option>
            </select>
            <label for="filter-year" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                Administrative Year
            </label>
        </div>
        <div class="flex flex-col relative w-2/3 md:w-1/3">
            <input type="text" id="filter-authors" name="authors" class="hidden">
            <button id="filter-author-button" type="button" class="w-full flex justify-between border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm pl-4 pr-3 py-2.5 inline-flex">
                Select Authors
                <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-[#3A37B0]">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <label for="filter-author-button" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                Author/s
            </label>
            <div id="filter-author-dropmenu" class="hidden z-10 absolute inset-x-0 top-10 w-fit border border-gray-300 bg-white rounded-md shadow overflow-y-auto">
                {{-- Rendered by filter.js --}}
            </div>
        </div>
        <div class="flex flex-col relative w-2/3 md:w-1/3">
            <select id="filter-area" name="area" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                <option value="all" class="text-sm">All Governance Areas</option>
                <option value="Financial Administration and Sustainability" class="text-sm">Financial Administration and Sustainability</option>
                <option value="Disaster Preparedness" class="text-sm">Disaster Preparedness</option>
                <option value="Safety, Peace and Order" class="text-sm">Safety, Peace and Order</option>    
                <option value="Social Protection and Sensitivity" class="text-sm">Social Protection and Sensitivity</option>  
                <option value="Business-Friendliness and Competitiveness" class="text-sm">Business-Friendliness and Competitiveness</option>  
                <option value="Environmental Mannagement" class="text-sm">Environmental Mannagement</option>  
            </select>
            <label for="filter-area" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                Governance Area
            </label>
        </div>
    </div>
    <div class="flex flex-col space-y-2 mx-6 mt-2">
        <div class="flex flex-row shrink space-x-2">
            <img src="{{ asset('/images/folder.svg') }}" alt="" class="h-4 w-4">
            <p class="font-sans text-sm font-base">Document Type</p>
        </div>
        <div class="flex flex-col space-y-2 md:flex-row md:space-y-0">
            <div class="flex flex-row items-center mr-7 md:w-[23%]">
                <input type="checkbox" id="filter-code_of_ordinance" name="code_of_ordinance" class="filter-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-code_of_ordinance" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Code of Ordinance</label>
            </div>
            <div class="flex flex-row items-center mr-1 md:w-[23%]">
                <input type="checkbox" id="filter-ordinance" name="ordinance" class="filter-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-ordinance" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Ordinance</label>
            </div>
            <div class="flex flex-row items-center mr-1 md:w-[23%]">
                <input type="checkbox" id="filter-resolution" name="resolution" class="filter-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-resolution" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Resolution</label>
            </div>
            <div class="flex flex-row items-center md:w-[23%]">
                <input type="checkbox" id="filter-others" name="others" class="filter-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-others" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Others</label>
            </div>
        </div>
    </div>
    <div class="flex flex-row space-x-2 justify-end mx-6 mt-8 pb-3 items-center">
        <button id="search-filter" type="button" class="px-2 py-1.5 font-sans font-medium text-sm text-[#1976D2] hover:text-gray-400">SEARCH</button>
        <button id="apply-filter" type="button" class="px-2 py-1.5 font-sans font-medium text-sm text-[#1976D2] hover:text-gray-400">APPLY</button>
    </div>
</div>

<script src="{{ asset('/js/filter.js') }}"></script>    