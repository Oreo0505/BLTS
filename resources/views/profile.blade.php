@extends('layout', [$title = 'Profile'])

@section('content')

    {{-- Navigation Bar --}}
    <x-navbar :barangay="$barangay" :municipality="$municipality"/>

    {{-- Top Accent --}}
    <img src="{{ asset('/images/accent-1.svg') }}" alt="" class="absolute -z-10 top-12 right-0">

    {{-- Category Drawer --}}
    <x-drawer :barangay="$barangay" :municipality="$municipality" :logo="$logo" :terms="$terms"/>

    <div class="flex flex-row relative justify-end items-center space-x-2 px-4 z-10">
        <img id="cancel-profile-button" src="{{ asset('/images/cancel-changes.svg') }}" alt="Cancel Changes" title="Cancel Changes" class="hidden translate-y-1 h-6 cursor-pointer hover:scale-125">
        <img id="submit-profile-button" src="{{ asset('/images/check.svg') }}" alt="Submit Changes" title="Submit Changes" class="hidden translate-y-1 scale-75 h-6 cursor-pointer hover:scale-100">
        <img id="update-profile-button" src="{{ asset('/images/update_profile.svg') }}" alt="Update Profile" title="Update Profile" class="w-6 cursor-pointer hover:scale-125">
        <x-modal.profile-menu :terms="$terms"/>
    </div>

    <div class="flex flex-col space-y-3 w-fit justify-start mx-auto mt-20 md:flex-row md:space-x-3 md:space-y-0">
        <div id="logo-holder" class="group flex flex-col p-2 justify-center cursor-pointer">
            <img src="{{ $logo ? asset('/storage'.'/'.$logo) : asset('/images/default_logo.svg')}}" alt="" class="h-36 w-36 group-hover:brightness-50">
            <img src="{{ asset('/images/camera.svg') }}" alt="Update Logo" title="Update Logo" class="invisible h-4 absolute relative -top-24 group-hover:visible">
            <p class="invisible absolute relative -top-20 rounded-md font-sans text-sm font-bold text-center text-white tracking-widest uppercase group-hover:visible">Update</p>
            <form action="/update/logo" method="POST" id="update-logo-form" enctype="multipart/form-data" class="hidden">
                @csrf
                <input type="file" id="update-logo-file" name="logo" accept="image/*" class="hidden">
            </form>
        </div>
        <div class="flex flex-col space-y-4 w-fit items-center p-2 md:items-start">
            <div class="flex flex-row space-x-2 items-start">
                <div class="flex w-6">
                    <img src="{{ asset('/images/government.svg') }}" alt="Barangay" class="h-6 w-6 translate-y-1">
                </div>
                <div class="flex flex-col">
                    <p class="font-sans font-medium text-2xl text-[#181313] uppercase whitespace-nowrap"> {{$barangay}} </p>
                    <p class="font-sans font-normal text-base text-[#181313] italic whitespace-nowrap ml-1 -translate-y-1">{{$municipality}}, Marinduque</p>
                </div>
            </div>
            <div class="flex flex-row space-x-2 items-center md:items-start">
                <div class="flex w-6">
                    <img src="{{ asset('/images/captain.svg') }}" alt="Punong Barangay" class="h-6 w-6 translate-y-1">
                </div>
                <div class="flex flex-col">
                    <p class="font-sans font-medium text-xl text-[#181313] whitespace-nowrap">Hon. <span id="captain" class="outline-none"> {{$captain->name}} </span></p>
                    <p class="font-sans font-normal text-base text-[#181313] italic whitespace-nowrap ml-1 -translate-y-1">Punong Barangay</p>
                </div>
            </div>
            <div class="flex flex-row space-x-2 items-center md:items-start">
                <div class="flex w-6">
                    <img src="{{ asset('/images/secretary.svg') }}" alt="Barangay Secretary" class="h-6 w-6 translate-y-1">
                </div>
                <div class="flex flex-col">
                    <p class="font-sans font-medium text-xl text-[#181313] whitespace-nowrap outline-none"> <span id="secretary" class="outline-none"> {{$secretary->name}} </span> </p>
                    <p class="font-sans font-normal text-base text-[#181313] italic whitespace-nowrap ml-1 -translate-y-1">Barangay Secretary</p>
                </div>
            </div>
            <div class="flex flex-row space-x-2 items-center md:items-start">
                <div class="flex w-6">
                    <img src="{{ asset('/images/chairman.svg') }}" alt="Sangguniang Kabataan Chairman" class="h-6 w-6 translate-y-1">
                </div>
                <div class="flex flex-col">
                    <p class="font-sans font-medium text-xl text-[#181313] whitespace-nowrap outline-none">Hon. <span id="chairman" class="outline-none"> {{$chairman->name}} </span></p>
                    <p class="font-sans font-normal text-base text-[#181313] italic whitespace-nowrap ml-1 -translate-y-1">Sangguniang Kabataan Chairman</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col space-y-4 w-fit items-center p-2 md:items-start">
            <div class="flex flex-row space-x-2 items-start">
                <div class="flex w-6">
                    <img src="{{ asset('/images/calendar.svg') }}" alt="Administration Year / Term Year" class="h-6 w-6 translate-y-1">
                </div>
                <div class="flex flex-col">
                    <p class="font-sans font-medium text-2xl text-[#181313] uppercase whitespace-nowrap">{{date('Y', strtotime($term->start))}} - {{date('Y', strtotime($term->end))}}</p>
                    <p class="font-sans font-normal text-base text-[#181313] italic whitespace-nowrap ml-1 -translate-y-1">Administrative Year / Term Year</p>
                </div>
            </div>
            <div class="flex flex-row space-x-2 items-start">
                <div class="flex w-6">
                    <img src="{{ asset('/images/member.svg') }}" alt="Sangguniang Barangay Member" class="h-6 w-6 translate-y-1">
                </div>
                <div class="flex flex-col">
                    <p class="font-sans font-medium text-xl text-[#181313] whitespace-nowrap">1. Hon. <span id="sb1" class="outline-none"> {{$sb_member_1->name}} </span></p>
                    <p class="font-sans font-medium text-xl text-[#181313] whitespace-nowrap">2. Hon. <span id="sb2" class="outline-none"> {{$sb_member_2->name}} </span></p>
                    <p class="font-sans font-medium text-xl text-[#181313] whitespace-nowrap">3. Hon. <span id="sb3" class="outline-none"> {{$sb_member_3->name}} </span></p>
                    <p class="font-sans font-medium text-xl text-[#181313] whitespace-nowrap">4. Hon. <span id="sb4" class="outline-none"> {{$sb_member_4->name}} </span></p>
                    <p class="font-sans font-medium text-xl text-[#181313] whitespace-nowrap">5. Hon. <span id="sb5" class="outline-none"> {{$sb_member_5->name}} </span></p>
                    <p class="font-sans font-medium text-xl text-[#181313] whitespace-nowrap">6. Hon. <span id="sb6" class="outline-none"> {{$sb_member_6->name}} </span></p>
                    <p class="font-sans font-medium text-xl text-[#181313] whitespace-nowrap">7. Hon. <span id="sb7" class="outline-none"> {{$sb_member_7->name}} </span></p>
                    <p class="font-sans font-normal text-base text-[#181313] italic whitespace-nowrap ml-1 -translate-y-1">Sangguniang Barangay Members</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Confirm Delete Modal --}}
    <x-modal.confirm-update/>

    {{-- Bottom Accent --}}
    <img src="{{ asset('/images/accent-1.svg') }}" alt="" class="absolute bottom-0 left-0 rotate-180">

    <form action="/profile/update" method="POST" id="update-profile-form" class="hidden">
        @csrf
        <input type="text" id="update-id" name="id" value="{{ $term->id }}">
        <input type="text" id="update-profile-captain" name="captain">
        <input type="text" id="update-profile-secretary" name="secretary">
        <input type="text" id="update-profile-chairman" name="chairman">
        <input type="text" id="update-profile-sb1" name="sb1">
        <input type="text" id="update-profile-sb2" name="sb2">
        <input type="text" id="update-profile-sb3" name="sb3">
        <input type="text" id="update-profile-sb4" name="sb4">
        <input type="text" id="update-profile-sb5" name="sb5">
        <input type="text" id="update-profile-sb6" name="sb6">
        <input type="text" id="update-profile-sb7" name="sb7">
    </form>

    <script src="{{ asset('/js/profile.js') }}"></script>

@endsection