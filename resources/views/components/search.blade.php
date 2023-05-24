<form action="/search" method="GET" id="search-form" {{ $attributes->merge(['class' => '']) }}>
    <div class="flex flex-col items-center justify-center -mt-4">
        <div class="w-2/3 flex items-center relative md:w-1/2">
            <img src="/images/search.svg" class="absolute start-0 h-8 ml-6" alt="Search Icon" />
            <input id="search-field" name="search" placeholder="Search something..." class="h-12 w-full border border-gray-400 rounded-full px-16 py-4 text-base text-[#4F4545] focus:outline-gray-400"/>
            <img src="/images/filter.svg" id="show-filter" class="absolute end-0 h-6 mr-6 cursor-pointer" alt="Filter" title="Filter"/>
        </div>
    </div>

    <x-modal.filter :terms="$terms"/>
</form>

<script src="{{ asset('/js/search.js') }}"></script>    
