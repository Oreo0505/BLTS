@extends('layout', [$title = 'Dashboard'])

@section('content')
    <div class="flex flex-col h-screen w-screen bg-gradient-30 from-[#425B71] to-[#425B71]/60 ">    

        <div class="flex flex-col drop-shadow">
            <div class="md:flex flex-row flex-auto items-center bg-gradient-30 from-[#425B71] to-[#425B71]/60  p-2 h-12">
                <div class="flex space-x-5 md:shrink-0">
                    <div>
                        <img src="{{ asset('/images/hamburger.svg') }}" id="open-drawer" alt="" class="h-9 cursor-pointer hover:stroke-neutral-500 hover:fill-neutral-500"> 
                    </div>
                    <div><img src="{{ asset('/images/dilg_logo.svg') }}" alt="" class="h-9"></div>
                    <div><img src="{{ asset('/images/om_logo.svg') }}" alt="" class="h-9"></div>
                    <div><img src="{{ asset('/images/lgrc_logo.svg') }}" alt="" class="h-9"></div>
                    <div><img src="{{ asset('/images/one_marinduque.png') }}" alt="" class="h-9"></div>
                </div>
            
                <div class="md:flex flex-auto space-x-2 pl-5">     
                    <p class="font-sans font-normal text-white text-base tracking-[5px] ">DILG MARINDUQUE</p>  
                </div>

                <div class="hidden items-center mr-3 justify-end w-1/4 space-x-6 md:flex">  
                    <p class="font-sans font-semibold text-white text-l "> {{$municipality}}, MARINDUQUE</p> 
                    <img id="enter-fullscreen" src="{{ asset('/images/enter_fullscreen.svg') }}" alt="Enter Fullscreen" title="Enter Fullscreen" class="h-6 cursor-pointer rounded-full hover:bg-gray-50/10">
                    <img id="exit-fullscreen" src="{{ asset('/images/exit_fullscreen.svg') }}" alt="Exit Fullscreen" title="Exit Fullscreen" class="h-6 cursor-pointer hidden rounded-full hover:bg-gray-50/10">
                    <img id="close-viewer" src="{{ asset('/images/close.svg') }}" alt="Close Viewer" title="Close Viewer" class="hidden h-6 scale-125 cursor-pointer rounded-full hover:bg-gray-50/10">
                    <a href="/about">
                        <img id="close-viewer" src="{{ asset('/images/help.svg') }}" alt="Close Viewer" title="Close Viewer" class="h-6 cursor-pointer rounded-full hover:bg-gray-50/10">
                    </a>
                </div>

            </div>
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
        <div class="flex h-screen w-3/4 flex-col justify-center md:flex-row items-center space-x-12 ">
            <div class="flex flex-col space-y-4 mb-12">
                <button id ="monthly" name="monthly" class="flex items-center justify-center text-white text-l font-normal font-sans border  rounded-full px-4 py-1 mx-6 mt-6 bg-gradient-270 from-[#A60453] to-[#FFB144]">Monthly</button>
                <button id="quarterly" name="quarterly" class="flex items-center justify-center text-white text-l font-normal font-sans border  rounded-full px-4 py-1 mx-6 bg-gradient-270 from-[#A60453] to-[#FFB144]">Quarterly</button>
                <button id="semi-annually" name="semi-annually" class="flex items-center text-white text-l font-normal font-sans border  rounded-full px-4 py-1 mx-6 bg-gradient-270 from-[#A60453] to-[#FFB144]">Semi-Annually</button>
                <button id="annually" name="annually" class="flex items-center justify-center text-white text-l font-normal font-sans border rounded-full px-4 py-1 mx-6 bg-gradient-270 from-[#A60453] to-[#FFB144]">Annually</button>
            </div>
            <div class="flex flex-col md:flex-row items-center justify-center mr-12">
                <i class = "flex font-roboto text-center text-lg md:text-2xl py-1 px-12 text-white" id="title">RESOLUTIONS</i> 
                <canvas class="mt-4 flex drop-shadow-lg shadow-lg h-82 rounded-lg bg-white mb-12" id="users-data"></canvas>
            </div>
        </div>
        <!-- <div class="bg-gray-200 rounded-lg shadow-lg flex flex-col place-self-center mt-4 w-3/4 h-96 mb-4">
            <button id="rating_bp" name="rating_bp" class="flex flex-row font-sans font-semibold text-sm md:text-base border-2 border-black rounded-full px-8 py-1 text-black">
            Monthly</button>
            <div class="flex relative md:items-start w-[50%] md:w-1/4 my-4 mx-4">
                <select id="select" name ="by" type="text" class="w-full flex  border border-gray-300 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex ">
                    <option value="null">Select...</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Quarterly">Quarterly</option>
                    <option value="Seminnually">Semianually</option>
                    <option value="Annually">Annually</option>
                </select>
            </div>
            <div class="flex flex-col items-center">
                <i class = "flex font-roboto text-center text-base lg:text-lg  py-1 px-12 mt-4 lg:mt-8" id="title">RESOLUTIONS</i> 
                <canvas class="mt-4 flex drop-shadow-lg shadow-lg h-3/4 w-3/4 rounded-lg bg-white" id="users-data"></canvas>
            </div>
        </div> -->
    </div>
    <!-- <img src="{{ asset('/images/accent-3.svg') }}" alt="" class="hidden md:block fixed bottom-0 right-0 rotate-180 w-[520px]">
    <div class="absolute right-10 bottom-0 mt-8 px-4">
        <img src="{{ asset('images/isay.svg') }}" alt="Image description" class="p w-50 h-40">
    </div> -->
    <script src="{{ asset('/js/drawer_admin.js') }}"></script>

@endsection