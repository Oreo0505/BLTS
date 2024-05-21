@extends('layout', [$title = 'Dashboard'])

@section('content')

    
    <div class="flex flex-col relative justify-between overflow-clip bg-gradient-30 from-[#425B71] to-[#425B71]/60">
        <div class="flex flex-col drop-shadow rounded-r-lg">
        <img src="{{ asset('/images/accent-3.svg') }}" alt="" class="fixed top-0 -right-8 w-[520px] rotate-180">
            <div class="flex flex-row flex-auto items-center bg-[#425B71] p-2 h-12">
                <div class="flex space-x-5">
                    <div><img src="{{ asset('/images/hamburger.svg') }}" id="open-drawer" alt="" class="h-9 cursor-pointer hover:stroke-neutral-500 hover:fill-neutral-500"></div>
                    <div><img src="{{ asset('/images/dilg_logo.svg') }}" alt="" class="h-9"></div>
                    <div><img src="{{ asset('/images/om_logo.svg') }}" alt="" class="h-9"></div>
                    <div><img src="{{ asset('/images/lgrc_logo.svg') }}" alt="" class="h-9"></div>
                    <div><img src="{{ asset('/images/one_marinduque.png') }}" alt="" class="h-9 mr-5"></div>
                </div>
            
                <div class="flex flex-auto space-x-2">     
                    <p class="font-sans font-normal text-white text-base tracking-[5px] ">DILG MARINDUQUE</p>  
                </div>

                <div class="hidden items-center mr-3 justify-end w-1/4 space-x-4 md:flex">  
                    <p class="font-sans font-semibold text-white text-l">BOAC, MARINDUQUE</p> 
                    <img id="enter-fullscreen" src="{{ asset('/images/enter_fullscreen.svg') }}" alt="Enter Fullscreen" title="Enter Fullscreen" class="h-6 cursor-pointer rounded-full hover:bg-gray-50/10">
                    <img id="exit-fullscreen" src="{{ asset('/images/exit_fullscreen.svg') }}" alt="Exit Fullscreen" title="Exit Fullscreen" class="h-6 cursor-pointer hidden rounded-full hover:bg-gray-50/10">
                    <img id="close-viewer" src="{{ asset('/images/close.svg') }}" alt="Close Viewer" title="Close Viewer" class="hidden h-6 scale-125 cursor-pointer rounded-full hover:bg-gray-50/10">
                    <a href="/about">
                        <img id="close-viewer" src="{{ asset('/images/help.svg') }}" alt="Close Viewer" title="Close Viewer" class="h-6 cursor-pointer rounded-full hover:bg-gray-50/10">
                    </a>
                </div>

            </div>
            <div class="flex flex-row space-y-2 bg-white"> 
                <div class="flex flex-col w-[1005px] h-[135px] item-end bg-white text-blue font-normal font-sans leading-[30px]"  >               
                <p class="text-3xl font-bold pl-10 pt-5">Welcome Administrator!</p>               
                <p class="text-base leading-[25px] py-2 pl-11">Feel free to explore the comprehensive statistical data  presented by our system</p>     
                </div>
                <img src="{{asset('images/hero.svg') }}" alt="" class="absolute right-12 w-50 h-12" >  
            </div>
         
            <p class="flex font-bold text-2xl text-black bg-white py-4 px-6">User's Statistics</p>
            <div class="flex flex-row items-center bg-white p-8 h-100">
                <div class="flex flex-col w-[270px] h-[100px] rounded-lg border drop-shadow-md bg-white z-20 md:h-[450px]">
                <div class="bg-gray-200 rounded-lg shadow-lg flex flex-col justify-self-center basis-1/2 p-5 mr-8 h-40 w-100 ">
                    <div class=" flex  justify-end p-2">
                        <p class="text-slate-900 text-1xl font-semibold font-sans">0</p>
                    </div>
                </div>


            </div>

            
        </div>
        
        <img src="{{ asset('/images/accent-3.svg') }}" alt="" class="fixed bottom-0 -left-8 w-[520px]">
        
    </div>

@endsection
