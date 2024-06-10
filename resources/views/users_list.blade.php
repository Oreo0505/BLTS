@extends('layout', ['title' => 'Users List'])

@section('content')
{{-- Category Drawer --}}
<x-drawer_admin :municipality="$municipality" :logo="$logo"/>

{{-- Navigation Bar --}}
<x-navbar_admin :municipality="$municipality"/>

<div class="flex flex-col h-screen w-screen bg-white items-center">
    
     <div class="bg-gray-200 rounded-lg w-70% flex flex-col md:flex-row shadow-lg py-8 px-8 space-y-4 md:space-x-4 justify-items-center justify-center mt-8 mb-8 w-1/3">
          <span class="box-decoration-clone text-3xl font-bold  pt-5">Hello👋🏼,<br>{{ $municipality }} Administrator</span>
          <div class="bg-gray-200 rounded-lg flex flex-row shadow-lg py-8 px-2 space-x-2 justify-center items-center mt-4 mb-8 w-64">
               <img src="{{ asset('images/brgy_count.svg') }}" alt="RESOLUTION" class="relative h-14">
               <div class="text-center space-y-2 md:text-left">
                    <p class="text-lg text-black font-semibold">No. of Barangay</p>
                    <p class="text-slate-500 text-3xl font-bold">{{ $barangay_count }}</p>
               </div>
          </div>
          <div class="bg-gray-200 rounded-lg flex flex-row shadow-lg px-2 space-x-2 justify-center items-center mt-4 mb-8 w-64">
               <img src="{{ asset('images/registered.svg') }}" alt="RESOLUTION" class="relative h-14">
               <div class="text-center space-y-2 md:text-left">
                    <p class="text-lg text-black font-semibold">Registered Members</p>
                    <p class="text-slate-500 text-3xl font-bold">{{ $registered_barangays }}</p>
               </div>
          </div>
     </div>
     <p class="flex font-bold font-sans text-black/80 text-2xl md:text-xl lg:text-2xl py-5 md:py-7 lg:py-4 justify-center md:justify-start md:px-10">Users List</p>

    <div id="users-list-table" class="mx-12 w-3/4 items-center"></div>


</div>

<script src="{{ asset('/js/gridjs.umd.js') }}"></script>
<script src="{{ asset('/js/users_list_table.js') }}"></script>
@endsection
