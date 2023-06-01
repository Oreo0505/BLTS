@extends('layout', [$title = 'Setup'])

@section('content')

    {{-- About Page link --}}
    <a href="/about">
        <img src="{{ asset('/images/help.svg') }}" alt="" class="absolute top-16 right-0 z-50 h-8 w-8">
    </a>
    
    <div class="flex flex-col-reverse justify-between overflow-clip md:flex-row md:space-y-0">
        <div class="flex flex-col w-2/5 h-[450px] mt-3 drop-shadow bg-gradient-30 from-[#425B71] to-[#425B71]/60 rounded-r-lg p-9 md:h-[800px] md:w-3/5 md:mt-0">
            <p class="font-sans font-normal text-white text-xl tracking-[5px]">DILG MARINDUQUE</p>
            <p class="font-sans font-extralight text-white text-base mt-16 md:mt-28">
                Barangay Legislative Tracking System (BLTS) is an offline repository platform for archiving Barangay Legislative Records. Barangay Secretary uploads code of ordinances, ordinances, resolutions and others.
            </p>
            <p class="font-sans font-normal text-white text-lg tracking-[3px] mt-8 md:mt-80">a project by</p>
            <p class="font-sans font-bold text-3xl text-white mt-10">ONE MARINDUQUE</p>
            <p class="font-sans font-bold text-3xl text-white">DILG - LGRC</p>
            <img src="{{ asset('/images/accent-2.svg') }}" alt="" class="absolute relative -top-24 -left-8 md:-top-36">
        </div>
        <div class="h-full flex flex-col w-3/5 px-16">
            <a href="/about">
                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-10 right-6 z-50">
                    <mask id="mask0_926_3369" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="25" height="25">
                        <rect x="0.408447" y="0.0491943" width="24" height="24" fill="#D9D9D9"/>
                    </mask>
                    <g mask="url(#mask0_926_3369)">
                        <path d="M11.0085 16.0492C11.0085 14.6992 11.1293 13.7284 11.371 13.1367C11.6127 12.545 12.1252 11.8992 12.9085 11.1992C13.5918 10.5992 14.1127 10.0784 14.471 9.63669C14.8293 9.19503 15.0085 8.69086 15.0085 8.12419C15.0085 7.44086 14.7793 6.87419 14.321 6.42419C13.8627 5.97419 13.2252 5.74919 12.4085 5.74919C11.5585 5.74919 10.9127 6.00753 10.471 6.52419C10.0293 7.04086 9.71683 7.56586 9.5335 8.09919L6.9585 6.99919C7.3085 5.93253 7.95016 5.00753 8.8835 4.22419C9.81683 3.44086 10.9918 3.04919 12.4085 3.04919C14.1585 3.04919 15.5043 3.53669 16.446 4.51169C17.3877 5.48669 17.8585 6.65753 17.8585 8.02419C17.8585 8.85753 17.6793 9.57003 17.321 10.1617C16.9627 10.7534 16.4002 11.4242 15.6335 12.1742C14.8168 12.9575 14.321 13.5534 14.146 13.9617C13.971 14.37 13.8835 15.0659 13.8835 16.0492H11.0085ZM12.4085 22.0492C11.8585 22.0492 11.3877 21.8534 10.996 21.4617C10.6043 21.07 10.4085 20.5992 10.4085 20.0492C10.4085 19.4992 10.6043 19.0284 10.996 18.6367C11.3877 18.245 11.8585 18.0492 12.4085 18.0492C12.9585 18.0492 13.4293 18.245 13.821 18.6367C14.2127 19.0284 14.4085 19.4992 14.4085 20.0492C14.4085 20.5992 14.2127 21.07 13.821 21.4617C13.4293 21.8534 12.9585 22.0492 12.4085 22.0492Z" fill="black"/>
                    </g>
                </svg>            
            </a>
            <img src="{{ asset('/images/accent-1.svg') }}" alt="" class="absolute right-0 -top-8">
            <p class="w-fit font-sans font-medium text-3xl bg-gradient-90 from-[#A60453] to-[#FFB144] bg-clip-text text-transparent mt-10">
                Setup Account
            </p>
            <p class="font-sans font-semibold text-xl leading-6 text-[#2D2D2D]">Create Your BLTS Profile</p>
            <img src="{{ asset('/images/logo.svg') }}" alt="" class="mx-auto mt-20 h-24">
            <form action="/setup/process" id="setup-form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col space-y-4 justify-center w-full mt-16 px-12 md:space-y-0 md:space-x-8 md:flex-row">
                    <div class="flex flex-col w-full md:w-80">
                        <div class="flex flex-col relative">
                            <select type="text" id="municipality" name="municipality" value="{{ old('municipality') }}" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                                <option value="null">Select Municipality...</option>
                                <option value="Boac">Boac</option>
                                <option value="Buenavista">Buenavista</option>
                                <option value="Gasan">Gasan</option>
                                <option value="Mogpog">Mogpog</option>
                                <option value="Sta. Cruz">Sta. Cruz</option>
                                <option value="Torrijos">Torrijos</option>
                            </select>
                            <label for="municipality" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                                Municipality
                            </label>
                        </div>
                        <div class="flex relative justify-center">
                            <p class="absolute -top mx-auto font-sans font-normal text-gray-700 text-sm leading-tight">Administrative Year / Term Year</p>
                        </div>
                        <div class="flex flex-row space-x-2 mt-8">
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
                                <input type="text" datepicker datepicker-autohide id="to" name="to" value="{{ old('to') }}" placeholder="AY end date" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
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
                        <div class="flex flex-col relative mt-3">
                            <input type="text" id="captain" name="captain" value="{{ old('captain') }}" placeholder="Punong Barangay" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                            <label for="captain" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                               Punong Barangay
                            </label>
                        </div>
                        <div class="flex flex-col relative mt-3">
                            <input type="text" id="secretary" name="secretary" value="{{ old('secretary') }}" placeholder="Barangay Secretary" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex placeholder:text-xs">
                            <label for="secretary" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                                Barangay Secretary
                            </label>
                        </div>
                    </div>
                    <div class="flex flex-col w-full md:w-80">
                        <div class="flex flex-col relative w-full">
                            <select type="text" id="barangay" name="barangay" value="{{ old('barangay') }}" class="w-full flex border border-gray-700 rounded-[7px] outline outline-0 font-sans font-normal leading-tight text-sm text-gray-700 focus:ring-1 focus:outline-none focus:ring-gray-700 rounded-lg text-sm px-4 py-2.5 inline-flex">
                                <option value="null">Select Barangay...</option>
                            </select>
                            <label for="barangay" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                                Barangay
                            </label>
                        </div>
                        <div class="flex flex-col relative w-full">
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
                                    <input type="text" id="chairman" name="chairman" value="{{ old('chairman') }}" placeholder="Sk Chairman" class="w-full mt-1 border-0 border-gray-700 font-sans font-normal px-1 py-0 text-sm text-gray-700 placeholder:text-xs">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col relative w-full mt-5">
                            <button id="upload-button" type="button" class="p-2.5 border border-gray-700 rounded-md italic text-left font-sans font-normal text-sm text-[#C4C4C4]">
                                Click here to Upload SB Logo
                                <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-2.5 right-3 h-5 w-5">
                                    <path d="M5.75 42.5C4.30625 42.5 3.07031 41.9859 2.04219 40.9578C1.01406 39.9297 0.5 38.6937 0.5 37.25V29.375H5.75V37.25H37.25V29.375H42.5V37.25C42.5 38.6937 41.9859 39.9297 40.9578 40.9578C39.9297 41.9859 38.6937 42.5 37.25 42.5H5.75ZM18.875 32V10.6063L12.05 17.4313L8.375 13.625L21.5 0.5L34.625 13.625L30.95 17.4313L24.125 10.6063V32H18.875Z" fill="#6B7280"/>
                                </svg>                                
                            </button>
                            <label for="upload-button" class="relative absolute -top-12 left-3 w-fit px-1 bg-white font-sans font-normal text-gray-700 text-[11px] leading-tight">
                                Upload SB Logo
                            </label>
                            <input type="file" accept="image/*" id="logo" name="logo" class="hidden">
                        </div>
                    </div>
                </div>
            </form>
            <button id="setup-button" type="button" class="mx-auto mt-8 px-12 py-3 rounded-full bg-gradient-270 from-[#A60453] to-[#FFB144] font-sans font-semibold text-xl leading-6 text-white">
                Setup Account
            </button>
        </div>
    </div>

    <script src="{{ asset('/js/setup.js') }}"></script>
    <script src="{{ asset('/js/datepicker.js') }}"></script>

@endsection