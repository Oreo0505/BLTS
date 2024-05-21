@extends('layout', [$title = 'Dashboard'])

@section('content')
    <div class="flex flex-col relative justify-between overflow-clip bg-gradient-30 from-[#425B71] to-[#425B71]/60">
        <div class="flex flex-col drop-shadow rounded-r-lg">
            <div class="md:flex flex-row flex-auto items-center bg-[#425B71] p-2 h-12">
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
                <p class="text-3xl font-bold pl-10 pt-5">Welcome Administrator!</p>               
                <p class="text-base leading-[25px] py-2 pl-11">Feel free to explore the comprehensive statistical data  presented by our system</p>     
                </div>
                <img src="{{asset('images/hero.svg') }}" alt="" class="hidden absolute right-12 w-50 h-12 md:flex">  
            </div>
         
            <p class="flex font-bold text-2xl text-black bg-white py-4 px-6">User's Statistics</p>
            <div class="flex flex-col md:flex-row m bg-white p-8 h-100 md:mx-6 ">
                <div class=" bg-gray-200 rounded-lg shadow-lg py-8 px-8 max-screen-md space-y-2 md:py-4 justify-items-center mt-20 mb-8 w-56 h-28">
                    <div class="text-center space-y-2 md:text-left">
                        <div class="space-y-0.5">
                            <p class="text-lg text-black font-semibold">User's Count</p>
                            <p class="text-slate-500 text-3xl font-bold"> {{$user_count}} </p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-8 px-4">
                    <img src="{{ asset('images/isay.svg') }}" alt="Image description" class="w-50 h-40">
                </div>

                <div class="bg-gray-200 rounded-lg shadow-lg flex flex-col place-self-center justify-self-center md:place-self-top pt-6 p-5 mr-10 w-full md:w-full h-96  md:h-full ">
                    <div class="flex flex-col relative w-full md:w-1/4 ">
                        <select type="text" class="w-full flex border border-gray-300 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                            <option value="null">Select...</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Quarterly">Quarterly</option>
                            <option value="Seminnually">Semianually</option>
                            <option value="Annually">Annually</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
        <img src="{{ asset('/images/accent-3.svg') }}" alt="" class="fixed top-12 -right-8 w-[520px] rotate-180">

        
    </div>
    <script src="{{ asset('/js/drawer_admin.js') }}"></script>

@endsection