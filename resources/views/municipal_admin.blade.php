@extends('layout', [$title = 'Dashboard'])

@section('content')
{{-- Category Drawer --}}
     <x-drawer_admin :municipality="$municipality"/>
     
     {{-- Navigation Bar --}}
    <x-navbar_admin :municipality="$municipality"/>

    <script src="{{asset('/js/moment.js')}}"></script>


  
    
    <div class="flex flex-col h-screen w-screen bg-gradient-30 from-[#425B71] to-[#425B71]/60 ">    

        <div class="flex flex-col drop-shadow">
           
            <div class="flex flex-row space-y-2 bg-white "> 
                <div class="flex flex-col w-[1005px] h-[135px] item-end bg-white text-blue font-normal font-sans leading-[30px]"  >               
                    <p class="text-3xl font-bold pl-10 pt-5">Welcome, {{$municipality}} Administrator!</p>               
                    <p class="text-base leading-[25px] py-2 pl-11">Feel free to explore the comprehensive statistical data  presented by our system</p>
                    <p class="flex font-bold text-2xl text-black bg-white py-6 px-12 bg-white text-gradient ">User's Statistics</p>      
                </div>
                <img src="{{asset('images/hero.svg') }}" alt="" class="hidden absolute right-12 w-50 h-12 md:flex"> 
               
            </div>
         
            
            <div class="flex flex-col md:flex-row  bg-white px-12 h-82 mx-8 justify-center space-x-6 mb-12">
                <div class=" bg-gray-200 rounded-lg  flex flex-row shadow-lg py-8 px-8 space-x-4 space-y-2 md:py-4 justify-items-center mt-4 mb-8 w-1/8 ">
                    <img src="{{asset ('images/users.svg')}}" alt="RESOLUTION" class="relative absolute top-0 right-0 h-14">
                    <div class=" text-center space-y-2 md:text-left">
                        <p class="text-lg text-black font-semibold ">User's Count</p>
                        <p class="text-slate-500 text-3xl font-bold"> {{$user_count}} </p>
                    </div>          
                </div>
                <div class=" bg-gray-200 rounded-lg flex flex-row shadow-lg py-8 px-8 space-x-4 md:py-4  mt-4 mb-8 w-1/8 ">
                    <img src="{{asset ('images/file-yellow.svg')}}" alt="RESOLUTION" class="relative absolute top-0 right-0 h-14">
                    <div class=" text-center space-y-2 md:text-left">
                        <p class="text-lg text-black font-semibold ">RESOLUTIONS</p>
                        <p class="text-slate-500 text-3xl font-bold"> {{$resolution_counts}} </p>
                    </div>          
                </div>
                <div class=" bg-gray-200 rounded-lg flex flex-row shadow-lg py-8 px-8 space-x-4 md:py-4 justify-items-center mt-4 mb-8 w-1/8 ">
                    <img src="{{asset ('images/file-red.svg')}}" alt="RESOLUTION" class="relative absolute top-0 right-0 h-14">
                    <div class=" text-center space-y-2 md:text-left">
                        <p class="text-lg text-black font-semibold ">ORDINANCES</p>
                        <p class="text-slate-500 text-3xl font-bold"> {{$ordinance_counts}} </p>
                    </div>          
                </div>
                <div class=" bg-gray-200 rounded-lg flex flex-row shadow-lg py-8 px-8 space-x-4 md:py-4 justify-items-center mt-4 mb-8 w-1/8 ">
                    <img src="{{asset ('images/file-blue.svg')}}" alt="RESOLUTION" class="relative absolute top-0 right-0 h-14">
                    <div class=" text-center space-y-2 md:text-left">
                        <p class="text-lg text-black font-semibold ">CODE OF ORDINANCES</p>
                        <p class="text-slate-500 text-3xl font-bold"> {{$code_of_ordinance_counts}} </p>
                    </div>          
                </div> 
            </div>
        </div>
        <div class="flex h-screen w-3/4 flex-col items-center justify-center md:flex-row items-center space-x-12">
            <div class="flex relative md:items-start w-[50%] md:w-1/8 mx-4">
                <select id="select" name="by" class="flex border-2 rounded-full border-[#969696] mt-2 pl-2 bg-white">
                    <option value="monthly">Monthly</option>
                    <option value="quarterly">Quarterly</option>
                    <option value="semi-annually">Semi-Annually</option>
                    <option value="annually">Annually</option>
                </select>
            </div>

            <input class="hidden flex border-2 rounded-full border-[#969696] mt-2 pl-2 bg-white" type="month" min="1900" max="2050" value="2023-01" id="monthly" name="value">
            <select class="hidden flex border-2 rounded-full border-[#969696] mt-2 pl-2 bg-white mr-6" id="quarterly" name="value">
                <option value="Q1">Q1</option>
                <option value="Q2">Q2</option>
                <option value="Q3">Q3</option>
                <option value="Q4">Q4</option>
            </select>
            <select class="hidden flex border-2 rounded-full border-[#969696] mt-2 pl-2 bg-white" id="semi-annually" name="value">
                <option value="H1">Jan-Jun</option>
                <option value="H2">Jul-Dec</option>
            </select>
            <input class="hidden flex border-2 rounded-full border-[#969696] mt-2 pl-2 bg-white" type="number" min="1900" max="2050" value="2023" id="annually" name="value">

            <div class="flex flex-col md:flex-row items-center justify-center mr-12">
                
                <canvas class="mt-4 flex drop-shadow-lg shadow-lg h-96 rounded-lg bg-white " id="documents-chart"></canvas>
            </div>
        </div>

           
    </div>
    <!-- <img src="{{ asset('/images/accent-3.svg') }}" alt="" class="hidden md:block fixed bottom-0 right-0 rotate-180 w-[520px]">
    <div class="absolute right-10 bottom-0 mt-8 px-4">
        <img src="{{ asset('images/isay.svg') }}" alt="Image description" class="p w-50 h-40">
    </div> -->
    
    <script src="{{ asset('/js/chart.js') }}"></script>
    <script src="{{ asset('/js/barangay_statistics.js') }}"></script>
    <script src="{{asset('/js/chart.umd.min.js')}}"></script>
   

    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->


@endsection