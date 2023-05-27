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
    <x-navbar :barangay="$barangay" :municipality="$municipality"/>

    <img src="{{ asset('/images/accent-1.svg') }}" alt="" class="fixed top-12 right-0">

    {{-- Category Drawer --}}
    <x-drawer :barangay="$barangay" :municipality="$municipality" :logo="$logo" :terms="$terms"/>

    {{-- Upload FAB --}}
    <button id="upload-fab" title="Upload" class="fixed z-90 bottom-10 right-8 bg-[#425B71] w-[72px] h-[72px] overflow-clip rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-[#346A90] hover:drop-shadow-2xl">
        <img src="{{ asset('/images/upload.svg') }}" alt="" class="h-9 w-9 translate-x-[18px]">
        <svg width="68" height="44" viewBox="0 0 68 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="scale-150 translate-x-1 translate-y-3">
            <path d="M80 7.22399V49C80 52.866 77.3303 56 74.0371 56H0C3.63886 24.3779 26.7231 0 54.6576 0C63.7941 0 72.4118 2.60782 80 7.22399Z" fill="#797979" fill-opacity="0.34"/>
        </svg>
    </button>

    {{-- Upload Modal --}}
    <x-modal.upload :authors="$authors"/>

    {{-- Hero --}}
    <div id="hero" class="h-48 mt-16">
        <img src="{{ asset('images/hero.svg') }}" alt="" class="mx-auto">
    </div>

    {{-- Search --}}
    <x-search :terms="$terms"/>

    {{-- Recent Upload Titleholder --}}
    <div class="relative flex flex-row mt-12 mx-36 justify-between items-center md:mx-60">
        <div class="flex justify-start">
            <p class="text-xl text-[#181313] font-bold font-sans ">Documents</p>
        </div>
        <div class="flex justify-end">
            <x-sort/>
        </div>
    </div>

    {{-- Document Cards --}}
    @if(count($documents) == 0)
        <div class="div flex flex-col mt-9 mx-4 justify-center items-center space-y-6">
            <p class="font-sans font-bold text-5xl text-gray-600 text-center">No Documents Uploaded Yet</p>
            <p class="font-sans font-medium text-xl text-gray-400 text-center">Get Started by clicking the Upload Button</p>
        </div>
    @else
        <div class="flex flex-col space-y-8 items-center py-8 mx-36 md:mx-60">
            @foreach($documents as $document)
                <x-card :document="$document"/>
            @endforeach
        </div>
    @endif

    {{-- PDF Viewer --}}
    <x-modal.viewer/>

    {{-- Update Modal --}}
    <x-modal.update :authors="$authors"/>

    {{-- Confirm Modal --}}
    <x-modal.confirm-delete/>
    
    <img src="{{ asset('/images/accent-1.svg') }}" alt="" class="fixed bottom-0 left-0 rotate-180">

    <script src="{{ asset('/js/flowbite.js') }}"></script>
    <script src="{{ asset('/js/datepicker.js') }}"></script>
</body>
</html>