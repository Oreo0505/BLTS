@extends('layout', [$title = 'Login'])

@section('content')

    {{-- About Page link --}}
    <a href="/about">
        <img src="{{ asset('/images/help.svg') }}" alt="" class="absolute top-16 right-0 z-50 h-8 w-8">
    </a>
    
    <div class="flex flex-col-reverse justify-between overflow-clip md:flex-row md:space-y-0">
        <div class="flex flex-col w-full h-[450px] mt-3 drop-shadow bg-gradient-30 from-[#425B71] to-[#425B71]/60 rounded-r-lg p-9 md:h-[800px] md:w-2/5 md:mt-0">
            <p class="font-sans font-normal text-white text-xl tracking-[5px]">DILG MARINDUQUE</p>
            <p class="font-sans font-extralight text-white text-base mt-16 md:mt-28">
                Barangay Legislative Tracking System (BLTS) is an offline repository platform for archiving Barangay Legislative Records. Barangay Secretary uploads code of ordinances, ordinances, resolutions and others.
            </p>
            <p class="font-sans font-normal text-white text-lg tracking-[3px] mt-8 md:mt-80">a project by</p>
            <p class="font-sans font-bold text-3xl text-white mt-10">ONE MARINDUQUE</p>
            <p class="font-sans font-bold text-3xl text-white">DILG - LGRC</p>
            <img src="{{ asset('/images/accent-2.svg') }}" alt="" class="absolute relative -top-24 -left-8 md:-top-36">
        </div>
        <div class="h-full flex flex-col w-full px-16 md:w-3/5">
            <a href="/about">
                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-10 right-6 z-50">
                    <mask id="mask0_926_3369" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="25" height="25">
                        <rect x="0.408447" y="0.0491943" width="24" height="24" fill="#D9D9D9"/>
                    </mask>
                    <g mask="url(#mask0_926_3369)">
                        <path d="M11.0085 16.0492C11.0085 14.6992 11.1293 13.7284 11.371 13.1367C11.6127 12.545 12.1252 11.8992 12.9085 11.1992C13.5918 10.5992 14.1127 10.0784 14.471 9.63669C14.8293 9.19503 15.0085 8.69086 15.0085 8.12419C15.0085 7.44086 14.7793 6.87419 14.321 6.42419C13.8627 5.97419 13.2252 5.74919 12.4085 5.74919C11.5585 5.74919 10.9127 6.00753 10.471 6.52419C10.0293 7.04086 9.71683 7.56586 9.5335 8.09919L6.9585 6.99919C7.3085 5.93253 7.95016 5.00753 8.8835 4.22419C9.81683 3.44086 10.9918 3.04919 12.4085 3.04919C14.1585 3.04919 15.5043 3.53669 16.446 4.51169C17.3877 5.48669 17.8585 6.65753 17.8585 8.02419C17.8585 8.85753 17.6793 9.57003 17.321 10.1617C16.9627 10.7534 16.4002 11.4242 15.6335 12.1742C14.8168 12.9575 14.321 13.5534 14.146 13.9617C13.971 14.37 13.8835 15.0659 13.8835 16.0492H11.0085ZM12.4085 22.0492C11.8585 22.0492 11.3877 21.8534 10.996 21.4617C10.6043 21.07 10.4085 20.5992 10.4085 20.0492C10.4085 19.4992 10.6043 19.0284 10.996 18.6367C11.3877 18.245 11.8585 18.0492 12.4085 18.0492C12.9585 18.0492 13.4293 18.245 13.821 18.6367C14.2127 19.0284 14.4085 19.4992 14.4085 20.0492C14.4085 20.5992 14.2127 21.07 13.821 21.4617C13.4293 21.8534 12.9585 22.0492 12.4085 22.0492Z" fill="black"/>
                    </g>
                </svg>            
            </a>
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
                        <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Username" class="w-64 flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                        <label for="password" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                            Username
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
                    <p class="flex mt-4 font-roboto text-sm font-medium text-[#2D3748] text-center md:text-base">Don't have an account? &nbsp;<span><a href="/register/user" class="font-roboto text-blue-500 hover:text-blue-700 text-sm md:text-base justify-self-center underline">Register here</a></span></p>
                </div>

                
            </form>
            
        </div>
    </div>

    <script src="{{ asset('/js/setup.js') }}"></script>
    <script src="{{ asset('/js/datepicker.js') }}"></script>

@endsection
