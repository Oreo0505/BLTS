<nav class="flex flex-col h-fit bg-[#425B71] sticky top-0 z-20 px-4 py-2 md:h-12 md:flex-row">
    <div class="flex flex-row space-x-2 items-center justify-center w-full cursor-pointer md:w-1/4 md:justify-start">
        <img src="{{ asset('/images/hamburger.svg') }}" id="open-drawer" alt="" class="h-9 cursor-pointer hover:stroke-neutral-500 hover:fill-neutral-500">
        <a href="/">
            <img src="{{ asset('/images/dilg_logo.svg') }}" alt="" class="h-9">        
        </a>
        <a href="/" class="">
            <img src="{{ asset('/images/duque_morion.png') }}" alt="" class="h-12">        
        </a>
        <a href="/">
            <img src="{{ asset('/images/lgrc_logo.svg') }}" alt="" class="h-9">        
        </a>
        <a href="/">
            <img src="{{ asset('/images/one_duque.png') }}" alt="" class="h-9">        
        </a>
    </div>

    <div class="md:flex flex-auto ">     
        <p class="font-sans font-normal text-white text-base tracking-[5px] ">DILG MARINDUQUE</p>  
    </div>
    
    
    <div class="hidden items-center mr-3 justify-end w-1/4 space-x-6 md:flex">  
        <p class="font-sans font-semibold text-white text-l uppercase"> {{$municipality}}, MARINDUQUE</p> 
        <img id="enter-fullscreen" src="{{ asset('/images/enter_fullscreen.svg') }}" alt="Enter Fullscreen" title="Enter Fullscreen" class="h-6 cursor-pointer rounded-full hover:bg-gray-50/10">
        <img id="exit-fullscreen" src="{{ asset('/images/exit_fullscreen.svg') }}" alt="Exit Fullscreen" title="Exit Fullscreen" class="h-6 cursor-pointer hidden rounded-full hover:bg-gray-50/10">
        <img id="close-viewer" src="{{ asset('/images/close.svg') }}" alt="Close Viewer" title="Close Viewer" class="hidden h-6 scale-125 cursor-pointer rounded-full hover:bg-gray-50/10">
        <a href="/about/admin">
            <img id="close-viewer" src="{{ asset('/images/help.svg') }}" alt="Close Viewer" title="Close Viewer" class="h-6 cursor-pointer rounded-full hover:bg-gray-50/10">
        </a>
        <a href="/admin/municipal">
            <svg id="home" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6 fill-white cursor-pointer rounded-full hover:bg-gray-50/10">
                <mask id="mask0_772_3295" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="26" height="26">
                    <rect width="26" height="26" fill="#D9D9D9"/>
                </mask>
                <g mask="url(#mask0_772_3295)">
                    <path d="M6.50004 20.5833H9.75004V14.0833H16.25V20.5833H19.5V10.8333L13 5.95833L6.50004 10.8333V20.5833ZM4.33337 22.75V9.75L13 3.25L21.6667 9.75V22.75H14.0834V16.25H11.9167V22.75H4.33337Z"/>
                </g>
            </svg>                
        </a>
     </div>

</nav>

<script src="{{ asset('/js/navbar.js') }}"></script>