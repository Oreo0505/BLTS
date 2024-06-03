<nav class="flex flex-col h-fit bg-[#425B71] sticky top-0 z-20 px-4 py-2 md:h-12 md:flex-row">
    <div class="flex flex-row space-x-2 items-center justify-center w-full cursor-pointer md:w-1/4 md:justify-start">
        <img id="open-drawer" src="{{ asset('/images/hamburger.svg') }}" alt="" class="h-9 cursor-pointer hover:stroke-neutral-500 hover:fill-neutral-500">
        <a href="/">
            <img src="{{ asset('/images/dilg_logo.svg') }}" alt="" class="h-9">        
        </a>
        <a href="/" class="">
            <img src="{{ asset('/images/om_logo.svg') }}" alt="" class="h-9">        
        </a>
        <a href="/">
            <img src="{{ asset('/images/lgrc_logo.svg') }}" alt="" class="h-9">        
        </a>
        <a href="/">
            <img src="{{ asset('/images/one_marinduque.png') }}" alt="" class="h-9">        
        </a>
    </div>

    <div class="md:flex flex-auto space-x-2 pl-5">     
         <p class="font-sans font-normal text-white text-base tracking-[5px] ">DILG MARINDUQUE</p>  
    </div>
    
    <div class="hidden items-center mr-3 justify-end w-1/4 space-x-6 md:flex">  
        <p class="font-sans font-semibold text-white text-l "> {{$municipality}}, MARINDUQUE</p> 
        <img id="enter-fullscreen" src="{{ asset('/images/enter_fullscreen.svg') }}" alt="Enter Fullscreen" title="Enter Fullscreen" class="h-6 cursor-pointer rounded-full hover:bg-gray-50/10">
        <img id="exit-fullscreen" src="{{ asset('/images/exit_fullscreen.svg') }}" alt="Exit Fullscreen" title="Exit Fullscreen" class="h-6 cursor-pointer hidden rounded-full hover:bg-gray-50/10">
        <img id="close-viewer" src="{{ asset('/images/close.svg') }}" alt="Close Viewer" title="Close Viewer" class="hidden h-6 scale-125 cursor-pointer rounded-full hover:bg-gray-50/10">
        <a href="/about/admin">
            <img id="close-viewer" src="{{ asset('/images/help.svg') }}" alt="Close Viewer" title="Close Viewer" class="h-6 cursor-pointer rounded-full hover:bg-gray-50/10">
        </a>
     </div>

</nav>

<script src="{{ asset('/js/navbar.js') }}"></script>