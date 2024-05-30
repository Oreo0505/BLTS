<div>
    <div id="drawer-overlay" class="hidden fixed w-full h-100 inset-0 z-10 overflow-hidden flex justify-center items-center brightness-50 backdrop-blur-sm animated faster"></div>
    <div id="drawer-admin" class="hidden fixed top-0 left-0 z-40 h-screen w-80 p-6 bg-[#363636] overflow-y-auto transition-transform -transform-x-full ease-in-out">
        <div class="flex flex-col">
            <div id="close-drawer" class="group flex flex-row shrink self-end items-center space-x-2">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-[#90CAF9] group-hover:fill-white/70">
                    <path d="M19 19V15C19 14.1667 18.7083 13.4583 18.125 12.875C17.5417 12.2917 16.8333 12 16 12H6.8L10.4 15.6L9 17L3 11L9 5L10.4 6.4L6.8 10H16C17.3833 10 18.5625 10.4875 19.5375 11.4625C20.5125 12.4375 21 13.6167 21 15V19H19Z"/>
                </svg>                
                <p class="text-sm font-medium text-[#90CAF9] font-sans cursor-pointer group-hover:text-white/70">CLOSE</p>
            </div>
            <div class="flex flex-col items-center justify-center mt-10">
                <p class="font-sans font-normal text-lg leading-9 tracking-wide text-white italic -translate-y-3">{{ $municipality }}, Marinduque</p>
                <a href="/profile" class="font-sans font-semibold text-base leading-6 tracking-[0.4px] text-[#90CAF9] uppercase">VIEW PROFILE</a>
            </div>
            
            <div class="flex flex-row h-12 justify-start items-center space-x-2 py-4">
                <img src="{{ asset('/images/folder.svg') }}" alt="" class="h-4 w-4">
                <p class="font-sans text-sm font-base text-[#90CAF9]">Administration Year</p>
            </div>

        </div>
        <a href="/logout">
            <div class="group flex flex-row p-2 space-x-5">                                      
                <p class="font-roboto text-white">Logout</p>
            </div>
        </a> 
    </div>
</div>

<script src="{{ asset('/js/drawer_admin.js') }}"></script>