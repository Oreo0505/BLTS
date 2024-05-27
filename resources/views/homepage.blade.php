@extends('layout', [$title = 'Home'])

@section('content')

    
    <div class="flex flex-col relative justify-between overflow-clip bg-gradient-30 from-[#425B71] to-[#425B71]/60">
        <div class="flex flex-col drop-shadow rounded-r-lg p-5">
            <div class="flex flex-row items-center">
                <div class="flex flex-row items-center space-x-3">
                   <img src="{{ asset ('/images/dilg_logo.svg')}}" alt="" class="w-10 h-10">
                <p class="font-sans font-normal text-white text-xl tracking-[5px]">DILG MARINDUQUE</p> 
                </div>
                
                <div class="flex flex-row z-20 space-x-0 ml-auto items-center">
                    <a href="/login">
                    <button id="login-button" type="button" class="text-lg text-white hover:bg-gradient-to-br from-[#A60453] to-[#FFB144] py-2 px-4 pr-2 rounded-full">
                        Login
                    </button>

                    </a>
                    
                    <a href="/setup">
                        <button id="signup-button" type="button" class=" text-white hover:bg-gradient-to-br from-[#A60453] to-[#FFB144] py-2 px-4 pr-2 rounded-full hover:font-sans text-lg leading-6 text-white">
                            Sign Up
                        </button>
                    </a>
                    
                    {{-- About Page link --}}
                    <a href="/about">
                        <img src="{{ asset('/images/help.svg') }}" alt="" class="top-16 right-5 z-50 h-6 w-8 hover:bg-gray-500 rounded-full ">
                    </a>
                </div>
                
            </div>
                
            <img src="{{ asset('/images/logo.svg') }}" alt="" class="mx-auto mt-20 h-24">
            <p class="font-sans font-extralight text-white text-2xl mt-16 z-20 text-center">
                Barangay Legislative Tracking System (BLTS) is an online repository platform <br> for archiving Barangay Legislative Records.
                Barangay Secretary uploads <br> code of ordinances, ordinances, resolutions and others.
            </p>            
            
            <div class="flex flex-row z-20 space-x-6 mr-16 justify-center my-12">
                <a href="/setup">
                    <button id="signup-button" type="button" class="px-12 py-3 rounded-full bg-gradient-270 from-[#425B71] to-[#425B71]/60 font-sans font-semibold text-xl leading-6 text-white border-2 transition-all hover:text-white hover:shadow-lg hover:bg-white">
                        Get Started
                    </button>
                </a>
                
                
            </div>
            
        
            <img src="{{ asset('/images/accent-2.svg') }}" alt="" class="absolute bottom-0 left-0 z-0">
            <img src="{{ asset('/images/accent-2.svg') }}" alt="" class="absolute top-0 right-0 rotate-180 z-0">
            <img src="{{ asset('/images/map.png') }}" alt="" class="absolute bottom-0 right-5 z-0 w-auto h-96">

            
            
            <div class="flex flex-col items-center mt-10">
                <p class="font-sans font-normal text-white text-lg tracking-[3px] mt-20">A project by</p>
                <p class="font-sans font-bold text-3xl text-white mt-10">ONE MARINDUQUE</p>
                <p class="font-sans font-bold text-3xl text-white">DILG - LGRC</p>  
            </div>
            
            
        </div>
        
    </div>

    <script src="{{ asset('/js/setup.js') }}"></script>
    <script src="{{ asset('/js/datepicker.js') }}"></script>

@endsection
