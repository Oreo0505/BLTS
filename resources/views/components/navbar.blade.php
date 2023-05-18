<nav class="flex flex-row h-12 bg-[#425B71] sticky top-0 z-20 px-4 py-2">
    <div class="flex flex-row space-x-2 items-center justify-self-start w-1/4">
        <svg id="open-drawer" width="48" height="48" class="flex h-10 cursor-pointer hover:stroke-neutral-500 hover:fill-neutral-500" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 30H33V28H15V30ZM15 25H33V23H15V25ZM15 18V20H33V18H15Z" fill="white"/>
        </svg>
        <img src="{{ asset('/images/dilg_logo.svg') }}" alt="" class="h-9">
        <img src="{{ asset('/images/om_logo.svg') }}" alt="" class="h-9">
        <img src="{{ asset('/images/lgrc_logo.svg') }}" alt="" class="h-9">
    </div>
    <div class="flex items-center justify-center w-full">
        <p class="font-sans-font-semibold text-white text-2xl leading-[29px] text-center">
            <span class="uppercase text-bold">{{ $barangay }},</span>
            {{ $municipality }}, Marinduque
        </p>
    </div>
    <div class="flex items-center mr-3 justify-end w-1/4 space-x-6">
        <img id="enter-fullscreen" src="{{ asset('/images/enter_fullscreen.svg') }}" alt="" class="h-6 cursor-pointer">
        <img id="exit-fullscreen" src="{{ asset('/images/exit_fullscreen.svg') }}" alt="" class="h-6 cursor-pointer hidden">
        <svg id="close-viewer" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden fill-white h-6 scale-150 cursor-pointer">
            <path d="M19 19V15C19 14.1667 18.7083 13.4583 18.125 12.875C17.5417 12.2917 16.8333 12 16 12H6.8L10.4 15.6L9 17L3 11L9 5L10.4 6.4L6.8 10H16C17.3833 10 18.5625 10.4875 19.5375 11.4625C20.5125 12.4375 21 13.6167 21 15V19H19Z"/>
        </svg>
    </div>
</nav>

<script src="{{ asset('/js/navbar.js') }}"></script>