<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
    <title>Homepage</title>
</head>
<body>
    <nav class="flex flex-row h-16 bg-gradient-270 from-[#5BB05E] to-[#4F8CB8] justify-start sticky top-0">
        <svg width="48" height="48" class="flex h-12 my-2 ml-3 mr-4 cursor-pointer hover:stroke-neutral-500 hover:fill-neutral-500" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 30H33V28H15V30ZM15 25H33V23H15V25ZM15 18V20H33V18H15Z" fill="white"/>
            </svg>
        <p class="my-auto font-sans font-medium text-xl text-white">BARANGAY LEGISLATIVE TRACKING SYSTEM</p>
    </nav>
    <div id="hero" class="h-48">
        <img src="{{ asset('images/hero.svg') }}" alt="" class="mt-4 mx-auto">
    </div>
    <div class="flex flex-col items-center justify-center mt-6">
        <div class="w-2/3 flex items-center relative md:w-1/2">
            <img src="/images/search.svg" class="absolute start-0 h-9 ml-6" alt="Search Icon" />
            <input placeholder="Search something..." class="h-12 w-full border border-gray-400 rounded-full px-16 py-4 text-base text-[#4F4545]"/>
            <img src="/images/filter.svg" class="absolute end-0 h-7 mr-7" alt="Search Icon" />
        </div>
    </div>
    <div class="div flex flex-row mt-9 justify-between items-center">
        <p class="ml-14 text-2xl text-[#181313] text-medium font-sans">Recent Uploads</p>
        <img src="{{ asset('/images/change_mode.svg') }}" alt="" class="h-8 mr-14">
    </div>
    <div class="flex flex-wrap justify-center mx-auto pt-6 px-14 space-y-2 md:justify-start md:gap-8">
        <div class="flex flex-col w-4/5 h-40 mt-2 border-b shadow justify-center px-2 space-y-2 md:w-[30%]">
            <div class="flex flex-row w-full space-x-2 items-center">
                <img src="{{ asset('/images/filter.svg') }}" alt="" class="h-9">
                <p class="text-xl opacity-90 font-semibold font-sans">Memorandum 2022-195</p>
            </div>
            <div class="flex p-1">
                <p class="text-gray-500 text-sm text-underline">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                </p>
            </div>
        </div>
        <div class="flex flex-col w-4/5 h-40 mt-2 border-b shadow justify-center px-2 space-y-2 md:w-[30%]">
            <div class="flex flex-row w-full space-x-2 items-center">
                <img src="{{ asset('/images/filter.svg') }}" alt="" class="h-9">
                <p class="text-xl opacity-90 font-semibold font-sans">Memorandum 2022-195</p>
            </div>
            <div class="flex p-1">
                <p class="text-gray-500 text-sm text-underline">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                </p>
            </div>
        </div>
        <div class="flex flex-col w-4/5 h-40 mt-2 border-b shadow justify-center px-2 space-y-2 md:w-[30%]">
            <div class="flex flex-row w-full space-x-2 items-center">
                <img src="{{ asset('/images/filter.svg') }}" alt="" class="h-9">
                <p class="text-xl opacity-90 font-semibold font-sans">Memorandum 2022-195</p>
            </div>
            <div class="flex p-1">
                <p class="text-gray-500 text-sm text-underline">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                </p>
            </div>
        </div>
        <div class="flex flex-col w-4/5 h-40 mt-2 border-b shadow justify-center px-2 space-y-2 md:w-[30%]">
            <div class="flex flex-row w-full space-x-2 items-center">
                <img src="{{ asset('/images/filter.svg') }}" alt="" class="h-9">
                <p class="text-xl opacity-90 font-semibold font-sans">Memorandum 2022-195</p>
            </div>
            <div class="flex p-1">
                <p class="text-gray-500 text-sm text-underline">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                </p>
            </div>
        </div>
        <div class="flex flex-col w-4/5 h-40 mt-2 border-b shadow justify-center px-2 space-y-2 md:w-[30%]">
            <div class="flex flex-row w-full space-x-2 items-center">
                <img src="{{ asset('/images/filter.svg') }}" alt="" class="h-9">
                <p class="text-xl opacity-90 font-semibold font-sans">Memorandum 2022-195</p>
            </div>
            <div class="flex p-1">
                <p class="text-gray-500 text-sm text-underline">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                </p>
            </div>
        </div>
    </div>
    <button title="Upload" class="fixed z-90 bottom-10 right-8 bg-[#4E89B2] w-[72px] h-[72px] overflow-clip rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-[#346A90] hover:drop-shadow-2xl">
        <img src="{{ asset('/images/upload.svg') }}" alt="" class="h-9 w-9 translate-x-[18px]">
        <svg width="68" height="44" viewBox="0 0 68 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="translate-y-4">
            <path d="M80 7.22399V49C80 52.866 77.3303 56 74.0371 56H0C3.63886 24.3779 26.7231 0 54.6576 0C63.7941 0 72.4118 2.60782 80 7.22399Z" fill="#6750A4" fill-opacity="0.12"/>
        </svg>
    </button>
</body>
</html>