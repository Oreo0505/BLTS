@extends('layout', [$title = 'Dashboard'])

@section('content')

    
    <div class="flex flex-col relative justify-between overflow-clip bg-gradient-30 from-[#425B71] to-[#425B71]/60">
        <div class="flex flex-col drop-shadow rounded-r-lg">
            <div class="flex flex-row items-center bg-blue-600 p-2"></div>
            
            <div class="flex flex-row items-center bg-yellow-300 p-2">
                <div class="flex flex-row items-center space-x-5">
                   <img src="{{ asset ('/images/dilg.png')}}" alt="" class="w-16 h-16">
                <p class="font-sans font-normal text-black text-xl tracking-[5px]">DILG MARINDUQUE</p> 
                </div>
                
            </div>

            <div class="flex flex-row items-center bg-red-600 p-2"></div>
                
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
