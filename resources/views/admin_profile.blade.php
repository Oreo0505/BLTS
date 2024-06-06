@extends('layout', [$title = 'Admin Profile'])

@section('content')

    {{-- Navigation Bar --}}
    <x-navbar_admin :municipality="$municipality"/>

    {{-- Top Accent --}}
    <img src="{{ asset('/images/accent-1.svg') }}" alt="" class="absolute -z-10 top-12 right-0">

    {{-- Category Drawer --}}
    <x-drawer_admin :municipality="$municipality"/>

    <div class="flex flex-row relative justify-end items-center space-x-2 px-4 z-10 mr-4 mt-4">
        <img id="cancel-profile-button" src="{{ asset('/images/cancel-changes.svg') }}" alt="Cancel Changes" title="Cancel Changes" class="hidden translate-y-1 h-6 cursor-pointer scale-125 hover:scale-150">
        <img id="submit-profile-button" src="{{ asset('/images/check.svg') }}" alt="Submit Changes" title="Submit Changes" class="hidden translate-y-1 scale-75 h-6 cursor-pointer hover:scale-100">
        <img id="update-profile-button" src="{{ asset('/images/update_profile.svg') }}" alt="Update Profile" title="Update Profile" class="w-6 m mr-2 cursor-pointer hover:scale-125">
    </div>

    <div class="flex flex-col space-y-3 w-fit justify-start mx-auto mt-20 md:flex-row md:space-x-0 md:space-y-0">
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
                    <img src="{{ asset('/images/government.svg') }}">
                </div>
                <div class="flex flex-col">
                    <p class="font-sans font-normal text-base text-[#181313] italic whitespace-nowrap ml-1 -translate-y-1">{{$municipality}}, Marinduque</p>
                </div>
            </div>
            <div class="flex flex-row space-x-2 items-start mt-10 space-y-4">
                <form action="/admin/municipal/profile/update" id="update-profile-form" method="POST" enctype="multipart/form-data" class="items-center">
                    @csrf
                    <div class="flex flex-row space-x-2 mb-4 items-center md:items-start">
                        <img src="{{ asset('/images/email_address.svg') }}" class="h-4 w-4 translate-y-3">    
                        <div class="flex flex-col">
                            <input type="email" id="email" name="email" value="{{ $email }}" class="border-0 px-0 py-0 font-sans font-medium text-xl">
                            <p class="font-sans font-normal text-xs text-slate-200 whitespace-nowrap ml-1 -translate-y-1">Email</p>
                        </div>
                    </div>
                    <div class="flex flex-row space-x-2 items-center md:items-start">
                        <img src="{{ asset('/images/icon_key.svg') }}" class="h-4 w-4 translate-y-3">
                        <div class="flex flex-col">
                            <input type="password" id="password" name="password" value="{{ substr($password, 0, 8) }}" class="border-0 px-0 py-0">
                            <p class="font-sans font-normal text-xs text-slate-200 whitespace-nowrap ml-1 -translate-y-1">Password</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Confirm Update Modal --}}
    <x-modal.confirm-update-admin/>

    {{-- Bottom Accent --}}
    <img src="{{ asset('/images/accent-1.svg') }}" alt="" class="absolute bottom-0 left-0 rotate-180">

    <script src="{{ asset('/js/admin_profile.js') }}"></script>

@endsection