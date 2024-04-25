@extends('layout', [$title = 'Login'])

@section('content')

    {{-- About Page link --}}
    <a href="/about">
        <img src="{{ asset('/images/help.svg') }}" alt="" class="absolute top-16 right-0 z-50 h-8 w-8">
    </a>
    
    <div class="flex flex-col-reverse justify-between overflow-clip md:flex-row md:space-y-0">
        <div class="flex flex-col w-full h-[450px] mt-3 drop-shadow bg-gradient-30 from-[#425B71] to-[#425B71]/60 rounded-r-lg p-9 md:h-[800px] md:w-2/5 md:mt-0">
            <div class="flex flex-row items-center justify-between"> <!-- Added items-center to vertically center align the items -->
                <p class="font-sans font-normal text-white text-xl tracking-[5px]">DILG MARINDUQUE</p>
                <a href="/" class="ml-4 flex-shrink-0"> <!-- Added flex-shrink-0 to prevent the anchor from shrinking -->
                    <svg id="home" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-white p-2 rounded-full hover:bg-gray-500">
                        <mask id="mask0_772_3295" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="26" height="26">
                            <rect width="26" height="26" fill="#000000"></rect>
                        </mask>
                        <g mask="url(#mask0_772_3295)">
                            <path d="M6.50004 20.5833H9.75004V14.0833H16.25V20.5833H19.5V10.8333L13 5.95833L6.50004 10.8333V20.5833ZM4.33337 22.75V9.75L13 3.25L21.6667 9.75V22.75H14.0834V16.25H11.9167V22.75H4.33337Z"></path>
                        </g>
                    </svg>           
                </a>
            </div>
            <p class="font-sans font-extralight text-white text-base mt-16 md:mt-28">
                Barangay Legislative Tracking System (BLTS) is an offline repository platform for archiving Barangay Legislative Records. Barangay Secretary uploads code of ordinances, ordinances, resolutions and others.
            </p>
            <p class="font-sans font-normal text-white text-lg tracking-[3px] mt-8 md:mt-80">a project by</p>
            <p class="font-sans font-bold text-3xl text-white mt-10">ONE MARINDUQUE</p>
            <p class="font-sans font-bold text-3xl text-white">DILG - LGRC</p>
            <img src="{{ asset('/images/accent-2.svg') }}" alt="" class="absolute relative -top-24 -left-8 md:-top-36">
        </div>
        <div class="h-full flex flex-col w-full px-16 md:w-3/5">
            <img src="{{ asset('/images/accent-1.svg') }}" alt="" class="absolute right-0 -top-8">
            <p class="w-fit font-sans font-medium text-3xl bg-gradient-90 from-[#A60453] to-[#FFB144] bg-clip-text text-transparent mt-10 pb-1">
                Login Account
            </p>
            <p class="font-sans font-semibold text-xl leading-6 text-[#2D2D2D]">Enter Your BLTS Account</p>
            <img src="{{ asset('/images/logo.svg') }}" alt="" class="mx-auto mt-20 h-24">
            <form action="/login/process" id="login-form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col mx-auto justify-center w-80 h-80 mt-16 md:space-y-5 items-center border border-gray-400 rounded-lg ">
                    <div class="flex flex-col relative mt-3">
                        <input type="text" id="email" name="email" value="{{ old('username') }}" placeholder="Email" class="w-64 flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                        <label for="password" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                            Email
                        </label>
                    </div>
                    
                    <div class="flex flex-col relative mt-3">
                        <input type="text" id="password" name="password" value="{{ old('password') }}" placeholder="Password" class="w-64 flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                        <label for="password" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                            Password
                        </label>
                    </div>

                    <button id="setup-button" type="button" class="mx-auto mt-4 px-12 py-3 rounded-full bg-gradient-270 from-[#A60453] to-[#FFB144] font-sans font-semibold text-xl leading-6 text-white">
                        Login
                    </button>
                    <p class="flex mt-4 font-roboto text-sm font-medium text-[#2D3748] text-center md:text-base">Don't have an account? &nbsp;<span><a href="/setup" class="font-roboto text-blue-500 hover:text-blue-700 text-sm md:text-base justify-self-center underline">Register here</a></span></p>
                </div>

                
            </form>
            
        </div>
    </div>

    <script src="{{ asset('/js/setup.js') }}"></script>
    <script src="{{ asset('/js/datepicker.js') }}"></script>

@endsection
