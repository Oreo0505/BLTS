<img id="profile-menu-button" src="{{ asset('/images/hamburger-accent.svg') }}" alt="Menu" title="Menu" class="translate-y-1 cursor-pointer">
<div id="profile-menu" class="hidden z-10 absolute flex-flex-col top-10 right-12 w-fit border border-[#888888] shadow-md bg-white">
    <div class="flex flex-col px-4 py-1 bg-[#F5F5F5] border-b border-[#888888]">
        <p class="font-sans font-normal text-sm">Menu</p>
    </div>
    <div class="flex flex-col py-2">
        <div class="flex group cursor-pointer px-4 hover:bg-[#0B91FF]">
            <button type="button" class="font-sans font-normal text-sm group-hover:text-white">Add Profiles for Previous Terms</button>
        </div>
        <div class="flex group cursor-pointer px-4 hover:bg-[#0B91FF]">
            <button type="button" id="previous-terms-button" class="w-full flex justify-between font-sans font-normal text-sm group-hover:text-white">
                View Previous Terms
                <div id="previous-terms-icon" class="flex -rotate-90 translate-y-1.5">
                    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-[#3A37B0]">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </button>
        </div>
    </div>
</div>
<div id="profile-menu-years" class="hidden z-10 absolute flex-flex-col top-32 right-12 w-fit border border-[#888888] shadow-md bg-white">
    <div class="flex flex-col px-4 py-1 bg-[#F5F5F5] border-b border-[#888888]">
        <p class="font-sans font-normal text-sm">Administrative Years</p>
    </div>
    <div class="flex flex-col py-2">

        @foreach($terms as $term)
            <div class="flex group cursor-pointer px-4 hover:bg-[#0B91FF]">
                <a href="/profile?id={{$term->id}}" class="sort-button font-sans font-normal text-sm group-hover:text-white">{{date('Y', strtotime($term->start))}} - {{date('Y', strtotime($term->end))}}</a>
            </div>
        @endforeach

    </div>
</div>

<script src="{{ asset('/js/profile_menu.js') }}"></script>