<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Homepage</title>
</head>
<body>
    <nav class="flex flex-row h-16 bg-gradient-270 from-[#5BB05E] to-[#4F8CB8] justify-start">
        <svg width="48" height="48" class="flex h-12 my-2 ml-3 mr-4 cursor-pointer hover:stroke-neutral-500 hover:fill-neutral-500" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 30H33V28H15V30ZM15 25H33V23H15V25ZM15 18V20H33V18H15Z" fill="white"/>
            </svg>
        <p class="my-auto font-sans font-medium text-xl text-white">BARANGAY LEGISLATIVE TRACKING SYSTEM</p>
    </nav>
    <div id="hero" class="h-48">
        <img src="{{ asset('images/hero.svg') }}" alt="" class="mt-4 mx-auto">
    </div>
    <div class="flex flex-col items-center justify-center mt-6">
        <div class="w-3/5 flex items-center relative">
            <img src="/images/search.svg" class="absolute start-0 h-9 ml-6" alt="Search Icon" />
            <input placeholder="Search something..." class="h-16 w-full border border-gray-400 rounded-full pl-20 p-4 text-base text-[#4F4545]"/>
            <img src="/images/filter.svg" class="absolute end-0 h-7 mr-7" alt="Search Icon" />
        </div>
    </div>
</body>
</html>