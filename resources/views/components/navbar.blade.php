<nav class="flex flex-col h-fit bg-[#425B71] sticky top-0 z-20 px-4 py-2 md:h-12 md:flex-row">
    <div class="flex flex-row space-x-2 items-center justify-center w-full cursor-pointer md:w-1/4 md:justify-start">
        <img src="{{ asset('/images/hamburger.svg') }}" id="open-drawer" alt="" class="h-9 cursor-pointer hover:stroke-neutral-500 hover:fill-neutral-500">
        <a href="/">
            <img src="{{ asset('/images/dilg_logo.svg') }}" alt="" class="h-9">        
        </a>
        <a href="/" class="">
            <img src="{{ asset('/images/om_logo.svg') }}" alt="" class="h-9">        
        </a>
        <a href="/">
            <img src="{{ asset('/images/lgrc_logo.svg') }}" alt="" class="h-9">        
        </a>
    </div>
    <div class="flex items-center justify-center w-full">
        <p class="font-sans font-semibold text-white text-2xl leading-[29px] text-center">
            <span class="uppercase font-bold">{{ $barangay }},</span>
            {{ $municipality }}, Marinduque
        </p>
    </div>
    <div class="hidden items-center mr-3 justify-end w-1/4 space-x-6 md:flex">
        <img id="enter-fullscreen" src="{{ asset('/images/enter_fullscreen.svg') }}" alt="" class="h-6 cursor-pointer">
        <img id="exit-fullscreen" src="{{ asset('/images/exit_fullscreen.svg') }}" alt="" class="h-6 cursor-pointer hidden">
        <svg id="close-viewer" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden fill-white h-6 scale-150 cursor-pointer">
            <path d="M19 19V15C19 14.1667 18.7083 13.4583 18.125 12.875C17.5417 12.2917 16.8333 12 16 12H6.8L10.4 15.6L9 17L3 11L9 5L10.4 6.4L6.8 10H16C17.3833 10 18.5625 10.4875 19.5375 11.4625C20.5125 12.4375 21 13.6167 21 15V19H19Z"/>
        </svg>
    </div>
</nav>

<script src="{{ asset('/js/navbar.js') }}"></script>