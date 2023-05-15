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
            <label for="filter-searchBy" class="before:content[\' \'] after:content[\' \'] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-700 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-700 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-700 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-gray-700">
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
            <label for="filter-year" class="before:content[\' \'] after:content[\' \'] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-gray-700 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-gray-700 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-gray-700 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-gray-700 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-700 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-700 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-700 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-gray-700">
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
                <label for="filter-submitted" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Submitted</label>
            </div>
            <div class="flex flex-row items-center w-[23%] mr-1">
                <input type="checkbox" id="filter-endorsed" name="filter-endorsed" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-endorsed" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Endorsed</label>
            </div>
            <div class="flex flex-row items-center w-[23%] mr-1">
                <input type="checkbox" id="filter-enacted" name="filter-enacted" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-enacted" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Enacted</label>
            </div>
            <div class="flex flex-row items-center w-[23%]">
                <input type="checkbox" id="filter-adopted" name="filter-adopted" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-adopted" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Adopted</label>
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
                <label for="filter-code_of_ordinance" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Code of Ordinance</label>
            </div>
            <div class="flex flex-row items-center w-[23%] mr-1">
                <input type="checkbox" id="filter-endorsement" name="filter-endorsement" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-endorsement" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Endorsement</label>
            </div>
            <div class="flex flex-row items-center w-[23%] mr-1">
                <input type="checkbox" id="filter-ordinance" name="filter-ordinance" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-ordinance" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Ordinance</label>
            </div>
            <div class="flex flex-row items-center w-[23%]">
                <input type="checkbox" id="filter-petition" name="filter-petition" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-petition" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Petition</label>
            </div>
        </div>
        <div class="flex flex-wrap md:flex-row">
            <div class="flex flex-row items-center w-[23%] mr-7">
                <input type="checkbox" id="filter-proposal" name="filter-proposal" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-proposal" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Proposal</label>
            </div>
            <div class="flex flex-row items-center w-[23%] mr-1">
                <input type="checkbox" id="filter-resolution" name="filter-resolution" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-resolution" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Resolution</label>
            </div>
            <div class="flex flex-row items-center w-[23%] mr-1">
                <input type="checkbox" id="filter-others" name="filter-others" class="attachment w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="filter-others" class="ml-2 text-sm font-base text-gray-700 cursor-pointer hover:text-gray-500">Others</label>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-center">
        <button id="apply-filter" class="w-20 h-10 bg-blue-500 hover:bg-blue-700 text-white text-sm font-normal font-sans py-2 px-4 rounded-full">
            Apply
        </button>
    </div>
</div>

<script src="{{ asset('/js/filter_search.js') }}"></script>
