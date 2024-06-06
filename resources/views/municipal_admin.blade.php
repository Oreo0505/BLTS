@extends('layout', [$title = 'Dashboard'])

@section('content')
{{-- Category Drawer --}}
     <x-drawer_admin :municipality="$municipality"/>
     
     {{-- Navigation Bar --}}
    <x-navbar_admin :municipality="$municipality"/>

    <script src="{{asset('/js/moment.js')}}"></script>

    
    
    <div  class="flex flex-col h-full w-screen bg-white "> 
      
       
        <div class="flex flex-col drop-shadow">
            <div id="bg-overlay" class="hidden fixed w-full h-full inset-0 z-10 overflow-hidden flex justify-center items-center brightness-50 backdrop-blur-sm animated faster"> </div>
           
            <div class="flex flex-row space-y-2 bg-white "> 
                <div class="flex flex-col w-[1005px] h-[135px] item-end bg-white text-blue font-normal font-sans leading-[30px]"  >               
                    <p class="text-3xl font-bold pl-10 pt-5">Welcome, {{$municipality}} Administrator!</p>               
                    <p class="text-base leading-[25px] py-2 pl-11">Feel free to explore the comprehensive statistical data  presented by our system</p>
                    <p class="flex font-bold text-2xl text-black bg-white py-6 px-12 bg-white text-gradient ">User's Statistics</p>      
                </div>
                <img src="{{asset('images/hero.svg') }}" alt="" class="hidden absolute right-12 w-50 h-12 md:flex"> 
               
            </div>
            
         
            
            <div class="flex flex-col md:flex-row  bg-white px-12 h-82 mx-8 justify-center space-x-6 mb-12 ">
                <div class=" bg-gray-100 rounded-lg flex flex-row shadow-lg py-8 px-8 space-x-4 space-y-2 md:py-4 justify-items-center mt-4 mb-8 w-1/8 cursor-pointer" id="user-count-card">
                    <img src="{{ asset('images/user_count.svg') }}" class="relative absolute top-0 right-0 h-14">
                    <div class="text-center space-y-2 md:text-left">
                        <p class="text-lg text-black font-semibold">User's Count</p>
                        <p class="text-slate-500 text-3xl font-bold">{{ $user_count }}</p>
                    </div>
                </div>

               

                <div id="user-count-list" class="hidden absolute top-14 h-96 left-12 bg-white border shadow-lg rounded-lg px-4 z-30">
                    <div class="flex flex-row items-center justify-center space-x-2">
                        <img src="{{ asset('images/user_list_icon.svg') }}" alt="REGISTERED BARANGAYS" class="h-8">
                        <p class="flex text-xl text-gradient font-semibold justify-center items-center my-4">REGISTERED BARANGAY LIST</p>
                    </div>
                    <div class="overflow-y-auto max-h-64"> <!-- Scrollable container -->
                        <ul>
                            @foreach($registered_barangays as $barangay)
                                <li class="p-2 border-b border-gray-300">{{ $barangay }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>


                <div class=" bg-gray-100 rounded-lg flex flex-row shadow-lg py-8 px-8 space-x-4 md:py-4  mt-4 mb-8 w-1/8 ">
                    <img src="{{asset ('images/res.svg')}}" alt="RESOLUTION" class="relative absolute top-0 right-0 h-14">
                    <div class=" text-center space-y-2 md:text-left">
                        <p class="text-lg text-black font-semibold ">RESOLUTIONS</p>
                        <p class="text-slate-500 text-3xl font-bold"> {{$resolution_counts}} </p>
                    </div>          
                </div>
                <div class=" bg-gray-100 rounded-lg flex flex-row shadow-lg py-8 px-8 space-x-4 md:py-4 justify-items-center mt-4 mb-8 w-1/8 ">
                    <img src="{{asset ('images/ord.svg')}}" alt="RESOLUTION" class="relative absolute top-0 right-0 h-14">
                    <div class=" text-center space-y-2 md:text-left">
                        <p class="text-lg text-black font-semibold ">ORDINANCES</p>
                        <p class="text-slate-500 text-3xl font-bold"> {{$ordinance_counts}} </p>
                    </div>          
                </div>
                <div class=" bg-gray-100 rounded-lg flex flex-row shadow-lg py-8 px-8 space-x-4 md:py-4 justify-items-center mt-4 mb-8 w-1/8 ">
                    <img src="{{asset ('images/code.svg')}}" alt="RESOLUTION" class="relative absolute top-0 right-0 h-14">
                    <div class=" text-center space-y-2 md:text-left">
                        <p class="text-lg text-black font-semibold ">CODE OF ORDINANCES</p>
                        <p class="text-slate-500 text-3xl font-bold"> {{$code_of_ordinance_counts}} </p>
                    </div>          
                </div> 
            </div>
            <div class="flex h-full w-full flex-col items-center justify-center space-x-12 bg-gradient-30 from-[#425B71] to-[#425B71]/60">
                <div class="flex relative w-[50%] md:w-1/8  ">
                    <select id="select" name="by" class="flex border-2 rounded-full border-[#969696] mt-2 pl-2 bg-white">
                        
                        @for ($year = 2000; $year <= 2050; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-center mr-12">
                    <canvas class=" mt-8 mb-8 flex drop-shadow-lg shadow-lg h-96 rounded-lg bg-white" id="documents-chart"></canvas>
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{asset('/js/user-count-list.js')}}"></script>



@endsection