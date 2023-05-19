<img src="{{ asset('/images/sort.svg') }}" alt="" id="sort-button" class="cursor-pointer">
<div id="sort-dropdown" class="hidden z-10 absolute flex-flex-col top-7 right-0 w-fit border border-[#888888] shadow-md bg-white">
    <div class="flex flex-col px-4 py-1 bg-[#F5F5F5] border-b border-[#888888]">
        <p class="font-sans font-normal text-sm">Sort by</p>
    </div>
    <div class="flex flex-col py-2">
        <div class="flex group cursor-pointer px-4 hover:bg-[#0B91FF]">
            <a href="?filter=created_at-asc" class="font-sans font-normal text-sm group-hover:text-white">Date Uploaded (Oldest - Latest)</a>
        </div>
        <div class="flex group cursor-pointer px-4 hover:bg-[#0B91FF]">
            <a href="?filter=created_at-desc" class="font-sans font-normal text-sm group-hover:text-white">Date Uploaded (Latest - Oldest)</a>
        </div>
        <div class="flex group cursor-pointer px-4 hover:bg-[#0B91FF]">
            <a href="?filter=date-asc" class="font-sans font-normal text-sm group-hover:text-white">Date Enacted (Oldest - Latest)</a>
        </div>
        <div class="flex group cursor-pointer px-4 hover:bg-[#0B91FF]">
            <a href="?filter=date-desc" class="font-sans font-normal text-sm group-hover:text-white">Date Enacted (Latest - Oldest)</a>
        </div>
    </div>
</div>

<script src="{{ asset('/js/sort.js') }}"></script>