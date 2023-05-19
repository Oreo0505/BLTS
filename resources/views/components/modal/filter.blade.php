<div id="filter-overlay" class="hidden fixed w-full h-100 inset-0 z-10 overflow-hidden flex justify-center items-center brightness-50 backdrop-blur-sm animated faster">
</div>
<div id="filter" class="hidden fixed inset-0 h-fit w-2/3 flex flex-col space-y-6 border drop-shadow-md shadow-lg modal-container bg-white mx-auto my-auto rounded z-50 overflow-y-auto p-6 animated faster md:w-1/2">
    <div id="hide-filter" class="group flex flex-row space-x-2 justify-start items-center h-9 shrink">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-black group-hover:fill-gray-700">
            <path d="M19 19V15C19 14.1667 18.7083 13.4583 18.125 12.875C17.5417 12.2917 16.8333 12 16 12H6.8L10.4 15.6L9 17L3 11L9 5L10.4 6.4L6.8 10H16C17.3833 10 18.5625 10.4875 19.5375 11.4625C20.5125 12.4375 21 13.6167 21 15V19H19Z"/>
        </svg>                
        <p class="text-sm font-medium text-black font-sans cursor-pointer group-hover:text-gray-700">CLOSE</p> 
    </div>
    <div class="flex flex-col space-y-3 items-center md:justify-between md:flex-row md:space-x-2 md:space-y-0">
        <div class="flex flex-col items-center relative w-2/3 md:w-1/3">
            <select name="filter-searchBy" id="filter-searchBy" class="type peer h-full w-full rounded-[7px] border border-gray-700 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-700 placeholder-shown:border-t-gray-700 empty:!bg-red-500 focus:border-2 focus:border-gray-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-gray-700">
                <option value="title" class="text-sm">Title</option>
                <option value="author" class="text-sm">Author</option>
            </select>
            <label for="filter-searchBy" class="before:content[\' \'] after:content[\' \'] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-700 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-700 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-700 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-gray-700">
                Search by...
            </label>
        </div>
        <div class="flex flex-col items-center relative w-2/3 md:w-1/3">
            <select name="filter-year" id="filter-year" class="type peer h-full w-full rounded-[7px] border border-gray-700 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-700 placeholder-shown:border-t-gray-700 empty:!bg-red-500 focus:border-2 focus:border-gray-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-gray-700">
                <option value="all" class="text-sm">All Terms</option>

                @foreach($terms as $term)
                    <option value="{{date('Y', strtotime($term->start))}}-{{date('Y', strtotime($term->end))}}" class="text-sm">{{date('Y', strtotime($term->start))}}-{{date('Y', strtotime($term->end))}}</option>
                @endforeach

                <option value="older" class="text-sm">Older Terms</option>
            </select>
            <label for="filter-year" class="before:content[\' \'] after:content[\' \'] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-700 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-700 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-700 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-gray-700">
                Administrative Year
            </label>
        </div>
        <div class="flex flex-col items-center relative w-2/3 md:w-1/3">
            <select name="filter-year" id="filter-year" class="type peer h-full w-full rounded-[7px] border border-gray-700 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-gray-700 placeholder-shown:border-t-gray-700 empty:!bg-red-500 focus:border-2 focus:border-gray-700 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-gray-700">
                <option value="all" class="text-sm">All Governance Areas</option>
                <option value="Financial Administration and Sustainability" class="text-sm">Financial Administration and Sustainability</option>
                <option value="Disaster Preparedness" class="text-sm">Disaster Preparedness</option>
                <option value="Safety, Peace and Order" class="text-sm">Safety, Peace and Order</option>    
                <option value="Social Protection and Sensitivity" class="text-sm">Social Protection and Sensitivity</option>  
                <option value="Business-Friendliness and Competitiveness" class="text-sm">Business-Friendliness and Competitiveness</option>  
                <option value="Environmental Mannagement" class="text-sm">Environmental Mannagement</option>  
            </select>
            <label for="filter-year" class="before:content[\' \'] after:content[\' \'] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-700 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-700 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-700 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-gray-700">
                Governance Area
            </label>
        </div>
    </div>
    <div class="flex flex-row space-x-2">
        <input type="checkbox" id="filter-older" name="filter-older" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
        <label for="filter-older" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Include past AY documents</label>
    </div>
    <div class="flex flex-col space-y-2">
        <div class="flex flex-row shrink space-x-2">
            <img src="{{ asset('/images/folder.svg') }}" alt="" class="h-4 w-4">
            <p class="font-sans text-sm font-base">Document Type</p>
        </div>
        <div class="flex flex-col space-y-2 md:flex-row md:space-y-0">
            <div class="flex flex-row items-center mr-7 md:w-[23%]">
                <input type="checkbox" id="filter-code_of_ordinance" name="filter-code_of_ordinance" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-code_of_ordinance" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Code of Ordinance</label>
            </div>
            <div class="flex flex-row items-center mr-1 md:w-[23%]">
                <input type="checkbox" id="filter-ordinance" name="filter-ordinance" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-ordinance" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Ordinance</label>
            </div>
            <div class="flex flex-row items-center mr-1 md:w-[23%]">
                <input type="checkbox" id="filter-resolution" name="filter-resolution" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-resolution" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Resolution</label>
            </div>
            <div class="flex flex-row items-center md:w-[23%]">
                <input type="checkbox" id="filter-others" name="filter-others" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-others" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Others</label>
            </div>
        </div>
    </div>
    <div class="flex self-end">
        <button id="apply-filter" class="flex bg-[#0288D1] rounded-full font-sans font-normal text-sm text-white px-6 py-2 hover:bg-[#086192] hover:text-gray-50">Apply</button>
    </div>
</div>

<script src="{{ asset('/js/filter_search.js') }}"></script>
