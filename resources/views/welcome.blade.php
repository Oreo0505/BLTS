<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/flowbite.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Homepage</title>
</head>
<body>

    {{-- Navigation Bar --}}
    <nav class="flex flex-row h-10 bg-[#425B71] justify-between items-center sticky top-0 z-20 px-4">
        <svg id="open-drawer" width="48" height="48" class="flex h-10 cursor-pointer hover:stroke-neutral-500 hover:fill-neutral-500" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 30H33V28H15V30ZM15 25H33V23H15V25ZM15 18V20H33V18H15Z" fill="white"/>
        </svg>
        <p id="time-counter" class="my-auto font-sans font-medium text-xl text-white">May 10, 2023 | 11:00 AM</p>
    </nav>

    {{-- Category Drawer --}}
    <x-drawer/>

    {{-- Upload FAB --}}
    <button id="upload-fab" title="Upload" class="fixed z-90 bottom-10 right-8 bg-[#425B71] w-[72px] h-[72px] overflow-clip rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-[#346A90] hover:drop-shadow-2xl">
        <img src="{{ asset('/images/upload.svg') }}" alt="" class="h-9 w-9 translate-x-[18px]">
        <svg width="68" height="44" viewBox="0 0 68 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="scale-150 translate-x-1 translate-y-3">
            <path d="M80 7.22399V49C80 52.866 77.3303 56 74.0371 56H0C3.63886 24.3779 26.7231 0 54.6576 0C63.7941 0 72.4118 2.60782 80 7.22399Z" fill="#797979" fill-opacity="0.34"/>
        </svg>
    </button>

    {{-- Upload Modal --}}
    <x-modal.upload/>

    {{-- Hero --}}
    <div id="hero" class="h-48">
        <img src="{{ asset('images/hero.svg') }}" alt="" class="mt-4 mx-auto">
    </div>

    {{-- Search --}}
    <div class="flex flex-col items-center justify-center mt-6">
        <div class="w-2/3 flex items-center relative md:w-1/2">
            <img src="/images/search.svg" class="absolute start-0 h-8 ml-6" alt="Search Icon" />
            <input id="search" name="search" placeholder="Search something..." class="h-12 w-full border border-gray-400 rounded-full px-16 py-4 text-base text-[#4F4545] focus:outline-gray-400"/>
            <img src="/images/filter.svg" id="show-filter" class="absolute end-0 h-6 mr-6 cursor-pointer" alt="Filter Icon" />
        </div>
    </div>

    {{-- Filter Modal --}}
    <x-modal.filter/>

    {{-- Recent Upload Titleholder --}}
    <div class="div flex flex-row mt-12 justify-between items-center">
        <p class="mx-auto text-xl text-[#181313] font-bold font-sans md:ml-60">Documents</p>
    </div>

    {{-- Document Cards --}}
    @if(count($documents) == 0)
        <div class="div flex flex-col mt-9 mx-4 justify-center items-center space-y-6">
            <p class="font-sans font-bold text-5xl text-gray-600 text-center">No Documents Uploaded Yet</p>
            <p class="font-sans font-medium text-xl text-gray-400 text-center">Get Started by clicking the Upload Button</p>
        </div>
    @else
        @foreach($documents as $document)
            <x-card :document="$document"/>
        @endforeach
    @endif

    {{-- Update Modal --}}
    <x-modal.update/>

    {{-- Confirm Modal --}}
    <x-modal.confirm-delete/>

    <script src="{{ asset('/js/flowbite.js') }}"></script>
    <script src="{{ asset('/js/datepicker.js') }}"></script>
    <script src="{{ asset('/js/datetime_counter.js') }}"></script>
    <script>
    </script>
</body>
</html>