<div>
    <div id="drawer-overlay" class="hidden fixed w-full h-100 inset-0 z-10 overflow-hidden flex justify-center items-center brightness-50 backdrop-blur-sm animated faster">
    </div>
    <div id="drawer" class="hidden fixed top-0 left-0 z-40 h-screen w-80 p-6 bg-[#363636] overflow-y-auto transition-transform -transform-x-full ease-in-out">
        <div class="flex flex-col">
            <div id="close-drawer" class="group flex flex-row shrink self-end items-center space-x-2">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-[#90CAF9] group-hover:fill-white/70">
                    <path d="M19 19V15C19 14.1667 18.7083 13.4583 18.125 12.875C17.5417 12.2917 16.8333 12 16 12H6.8L10.4 15.6L9 17L3 11L9 5L10.4 6.4L6.8 10H16C17.3833 10 18.5625 10.4875 19.5375 11.4625C20.5125 12.4375 21 13.6167 21 15V19H19Z"/>
                </svg>                
                <p class="text-sm font-medium text-[#90CAF9] font-sans cursor-pointer group-hover:text-white/70">CLOSE</p>
            </div>
            <div class="flex items-center justify-center mt-9">
                <img src="{{ $logo ? asset('/storage'.'/'.$logo) : asset('/images/default_logo.svg')}}" alt="" class="h-36">
            </div>
            <div class="flex flex-col items-center justify-center mt-2.5">
                <p class="font-sans font-normal text-2xl leading-9 tracking-wide text-white uppercase">{{ $barangay }}</p>
                <p class="font-sans font-normal text-lg leading-9 tracking-wide text-white italic -translate-y-3">{{ $municipality }}, Marinduque</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 mb-2 hover:bg-[#508DB9]/10 mt-6">
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
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">Ordinance</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">Resolution</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">Others</p>
            </div>
            <div class="flex flex-row h-12 justify-start items-center space-x-2 py-4">
                <img src="{{ asset('/images/folder.svg') }}" alt="" class="h-4 w-4">
                <p class="font-sans text-sm font-base text-[#90CAF9]">Administration Year</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">2012 - 2015</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">2015 - 2018</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">2018 - 2022</p>
            </div>
            <div class="group flex flex-row h-11 justify-start items-center space-x-2 pl-6 py-4 hover:bg-[#508DB9]/10">
                <p class="font-sans text-sm font-base text-white opacity-70 cursor-pointer group-hover:text-[#90CAF9]">2022 - 2025</p>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/js/drawer.js') }}"></script>
