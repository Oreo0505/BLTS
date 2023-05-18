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
    <div class="flex items-center mr-3 justify-end w-1/4">
        <img id="enter-fullscreen" src="{{ asset('/images/enter_fullscreen.svg') }}" alt="" class="h-6 cursor-pointer">
        <img id="exit-fullscreen" src="{{ asset('/images/exit_fullscreen.svg') }}" alt="" class="h-6 cursor-pointer hidden">
    </div>
</nav>

<script src="{{ asset('/js/navbar.js') }}"></script>