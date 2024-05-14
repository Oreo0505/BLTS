@extends('layout', [$title = 'Dashboard'])

@section('content')

    
    <div class="flex flex-col relative justify-between overflow-clip bg-gradient-30 from-[#425B71] to-[#425B71]/60">
        <div class="flex flex-col drop-shadow rounded-r-lg">
            
            <div class="flex flex-row items-center bg-[#425B71] p-2 h-12">
                <div class="flex flex-row items-center space-x-5">
                   <img src="{{ asset ('/images/dilg.png')}}" alt="" class="w-16 h-16">
                <p class="font-sans font-normal text-white text-base tracking-[5px]">DILG MARINDUQUE</p> 
                </div>
                
            </div>
        </div>
             
    </div>

@endsection
