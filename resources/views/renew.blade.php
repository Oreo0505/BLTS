<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/css/flowbite.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Update Profile</title>
</head>
<body>
    <div id="overlay" class="fixed w-full h-100 inset-0 overflow-hidden flex justify-center items-center bg-gradient-215 from-[#425B71] to-[#425B71]/60">
    </div>
    <div id="upload" class="fixed inset-0 h-fit w-4/5 overflow-clip flex flex-col border drop-shadow-md shadow-lg modal-container bg-white mx-auto my-auto rounded z-50 pb-6 md:w-2/5">
        <img src="{{ asset('/images/accent-1.svg') }}" alt="" class="absolute right-0 -top-16">
        <div class="flex flex-col justify-start px-8 py-6">
            <p class="w-fit font-sans font-medium text-xl bg-gradient-90 from-[#A60453] to-[#FFB144] bg-clip-text text-transparent">
                Update Account
            </p>
            <p class="font-sans font-semibold text-sm leading-4 text-[#2D2D2D]">
                Administrative Term has ended.
            </p>
            <p class="font-sans font-semibold text-sm leading-4 text-[#2D2D2D]">
                Update Your BLTS Profile now!
            </p>
        </div>
        <div class="flex items-center justify-center mb-4">
            <img src="{{ asset('/images/logo.svg') }}" alt="" class="h-20">
        </div>
        <div class="flex relative justify-center">
            <p class="mx-auto font-sans font-normal text-black/50 text-sm leading-4">Administrative Year / Term Year</p>
        </div>
        <form action="/renew/process" method="POST" id="renew-form">
            @csrf
            <div class="flex flex-col space-y-2 justify-center mx-12 md:space-y-0 md:mx-24">
                <div class="flex flex-col space-y-2 md:flex-row md:space-x-3 md:space-y-0 mt-4">
                    <div class="flex flex-col relative w-full md:w-1/2">
                        <input type="text" datepicker datepicker-autohide id="from" name="from" value="{{ old('from') }}" placeholder="AY start date" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                        <label for="from" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                            From
                        </label>                 
                        <div class="absolute inset-y-0 right-0 flex mt-2 pr-3 cursor-pointer">
                            <svg id="from-date-icon" aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-col relative w-full md:w-1/2">
                        <input type="text" datepicker datepicker-autohide id="to" name="to" value="{{ old('from') }}" placeholder="AY end date" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                        <label for="to" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                            To
                        </label>                 
                        <div class="absolute inset-y-0 right-0 flex mt-2 pr-3 cursor-pointer">
                            <svg id="to-date-icon" aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col space-y-2 md:flex-row md:space-x-3 md:space-y-0">
                    <div class="flex flex-col relative">
                        <input type="text" id="captain" name="captain" value="{{ old('captain') }}" placeholder="Punong Barangay" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                        <label for="captain" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                           Punong Barangay
                        </label>
                    </div>
                    <div class="flex flex-col relative">
                        <input type="text" id="secretary" name="secretary" value="{{ old('captain') }}" placeholder="Barangay Secretary" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                        <label for="secretary" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                           Secretary
                        </label>
                    </div>
                </div>
                <div class="flex flex-col relative w-full -translate-y-2">
                    <p class="w-fit relative absolute top-2 left-3 px-1 font-sans font-normal text-[11px] text-gray-700 bg-white leading-tight">
                        Sangguniang Barangay Members
                    </p>
                    <div class="h-32 flex flex-col space-y-4 w-full border border-gray-700 rounded-[7px] p-4 overflow-x-auto">
                        <div class="h-2 flex flex-row space-x-2 items-center">
                            <label for="sb1" class="font-sans font-normal text-sm text-gray-700 leading-tight mt-1">1.</label>
                            <input type="text" id="sb1" name="sb1" value="{{ old('sb1') }}" placeholder="SB Member No.1" class="sb-member w-full mt-1 border-0 border-gray-700 font-sans font-normal px-1 py-0 text-sm text-gray-700 placeholder:text-xs">
                        </div>
                        <div class="h-2 flex flex-row space-x-2 items-center">
                            <label for="sb2" class="font-sans font-normal text-sm text-gray-700 leading-tight mt-1">2.</label>
                            <input type="text" id="sb2" name="sb2" value="{{ old('sb2') }}" placeholder="SB Member No.2" class="sb-member w-full mt-1 border-0 border-gray-700 font-sans font-normal px-1 py-0 text-sm text-gray-700 placeholder:text-xs">
                        </div>
                        <div class="h-2 flex flex-row space-x-2 items-center">
                            <label for="sb3" class="font-sans font-normal text-sm text-gray-700 leading-tight mt-1">3.</label>
                            <input type="text" id="sb3" name="sb3" value="{{ old('sb3') }}" placeholder="SB Member No.3" class="sb-member w-full mt-1 border-0 border-gray-700 font-sans font-normal px-1 py-0 text-sm text-gray-700 placeholder:text-xs">
                        </div>
                        <div class="h-2 flex flex-row space-x-2 items-center">
                            <label for="sb4" class="font-sans font-normal text-sm text-gray-700 leading-tight mt-1">4.</label>
                            <input type="text" id="sb4" name="sb4" value="{{ old('sb4') }}" placeholder="SB Member No.4" class="sb-member w-full mt-1 border-0 border-gray-700 font-sans font-normal px-1 py-0 text-sm text-gray-700 placeholder:text-xs">
                        </div>
                        <div class="h-2 flex flex-row space-x-2 items-center">
                            <label for="sb5" class="font-sans font-normal text-sm text-gray-700 leading-tight mt-1">5.</label>
                            <input type="text" id="sb5" name="sb5" value="{{ old('sb5') }}" placeholder="SB Member No.5" class="sb-member w-full mt-1 border-0 border-gray-700 font-sans font-normal px-1 py-0 text-sm text-gray-700 placeholder:text-xs">
                        </div>
                        <div class="h-2 flex flex-row space-x-2 items-center">
                            <label for="sb6" class="font-sans font-normal text-sm text-gray-700 leading-tight mt-1">6.</label>
                            <input type="text" id="sb6" name="sb6" value="{{ old('sb6') }}" placeholder="SB Member No.6" class="sb-member w-full mt-1 border-0 border-gray-700 font-sans font-normal px-1 py-0 text-sm text-gray-700 placeholder:text-xs">
                        </div>
                        <div class="h-2 flex flex-row space-x-2 items-center">
                            <label for="sb7" class="font-sans font-normal text-sm text-gray-700 leading-tight mt-1">7.</label>
                            <input type="text" id="sb7" name="sb7" value="{{ old('sb7') }}" placeholder="SB Member No.7" class="sb-member w-full mt-1 border-0 border-gray-700 font-sans font-normal px-1 py-0 text-sm text-gray-700 placeholder:text-xs">
                        </div>
                        <div class="h-2 flex flex-row space-x-2 items-center">
                            <label for="chairman" class="font-sans font-normal text-sm text-gray-700 leading-tight mt-1">8.</label>
                            <input type="text" id="chairman" name="chairman" value="{{ old('chairman') }}" placeholder="SK Chairman" class="w-full mt-1 border-0 border-gray-700 font-sans font-normal px-1 py-0 text-sm text-gray-700 placeholder:text-xs">
                        </div>
                    </div>
                </div>
            </div>        
        </form>
        <button id="renew-button" type="button" class="mx-auto mt-6 px-16 py-3 rounded-lg bg-gradient-270 from-[#A60453] to-[#FFB144] font-sans font-bold text-xl leading-6 text-white">
            Update
        </button>
    </div>

    <script src="{{ asset('/js/renew.js') }}"></script>
    <script src="{{ asset('/js/datepicker.js') }}"></script>
</body>
</html>