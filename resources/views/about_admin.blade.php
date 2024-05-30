@extends('layout', [$title = 'About'])

@section('content')

    <div id="container" class="w-screen">
        <a href="/admin/municipal">
            <svg id="home" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg" class="fixed top-4 left-4 h-10 w-10 fill-white p-2 rounded-full hover:bg-gray-500">
                <mask id="mask0_772_3295" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="26" height="26">
                    <rect width="26" height="26" fill="#D9D9D9"/>
                </mask>
                <g mask="url(#mask0_772_3295)">
                    <path d="M6.50004 20.5833H9.75004V14.0833H16.25V20.5833H19.5V10.8333L13 5.95833L6.50004 10.8333V20.5833ZM4.33337 22.75V9.75L13 3.25L21.6667 9.75V22.75H14.0834V16.25H11.9167V22.75H4.33337Z"/>
                </g>
            </svg>                
        </a>
        <img src="{{ asset('/images/accent-3.svg') }}" alt="" class="fixed top-0 -right-8 w-[520px] rotate-180">
        <section id="info" class="section">
            <div class="w-full flex flex-col items-center bg-[#425B71] px-[115px] pt-[88px] pb-1 md:h-[525px] md:pb-28">
                <img id="hero" src="{{ asset('/images/logo-white.svg') }}" alt="BLTS Logo" class="flex h-32">
                <p class="flex font-sans font-bold text-white text-center text-base leading-5 italic">
                    Store your barangay legislative documents in <br> BLTS, the responsive offline website
                </p>
                <p class="flex mt-16 font-sans font-normal text-white text-center leading-[21.6px]">
                    This aims to aide Barangay Officials in managing and keeping their records through an offline website wherein the documents
                    <br>stored, such as Code of Ordinance, Ordinance, Resolution, Proposal, and others which are proposed and enacted by Barangays,
                    <br>are distinguished with which administrative term they were uploaded.
                </p>
                <a href="/manual.pdf" target="_norefer" class="flex bg-white rounded-full mt-9 px-6 py-3 font-sans font-bold text-lg text-[#425B71] text-center">
                    View Documentation
                </a>
                <hr id="breakpoint">
                <a href="#authors" id="scroll-button" class="translate-y-8 h-fit w-fit flex items-center justify-center p-4 rounded-full bg-white shadow-md">
                    <img src="{{ asset('/images/arrow-head.svg') }}" id="arrow-head" alt="" class="h-5 w-5">
                </a>
            </div>
        </section>
        <section id="authors" class="section">
            <div class="flex flex-row justify-none space-x-8 px-5 pt-14 pb-10 w-screen overflow-x-scroll md:justify-center">
                <div class="flex flex-col w-[270px] h-[410px] rounded-lg border drop-shadow-md bg-white z-20 md:h-[450px]">
                    <div class="flex h-[250px] bg-[url('/images/clarence.png')] bg-top rounded-t-lg"></div>
                    <p class="mt-4 px-2 font-roboto font-bold text-xl leading-8 text-center text-[#4B4B4B] uppercase">
                        CLARENCE S. MADRIGAL
                    </p>
                    <p class="font-sans font-normal text-xs leading-5 text-center text-[#707070]">
                        BSCpE Intern, MSC
                    </p>
                    <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-6 ml-3 md:ml-6">
                        <img src="{{ asset('/images/location.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            Dili, Gasan, Marinduque
                        </p>
                    </div>
                    <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6">
                        <img src="{{ asset('/images/phone.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            0918-399-3030
                        </p>
                    </div>
                    <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6 mb-5">
                        <img src="{{ asset('/images/email.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            clarencemadrigal08@gmail.com
                        </p>
                    </div> 
                </div>
                <div class="flex flex-col w-[270px] h-[410px] rounded-lg border drop-shadow-md bg-white z-20 md:h-[450px]">
                    <div class="flex h-[250px] bg-[url('/images/jepthe.png')] bg-top bg-cover rounded-t-lg"></div>
                    <p class="mt-4 px-2 font-roboto font-bold text-xl leading-8 text-center text-[#4B4B4B] uppercase">
                        JEPTHE M. LADERAS
                    </p>
                    <p class="font-sans font-normal text-xs leading-5 text-center text-[#707070]">
                        BSCpE Intern, MSC
                    </p>
                    <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-6 ml-3 md:ml-6">
                        <img src="{{ asset('/images/location.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            Tampus, Boac, Marinduque
                        </p>
                    </div>
                    <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6">
                        <img src="{{ asset('/images/phone.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            0916-418-2098
                        </p>
                    </div>
                    <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6 mb-5">
                        <img src="{{ asset('/images/email.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            jeptheladeras@gmail.com
                        </p>
                    </div> 
                </div>
                <div class="flex flex-col w-[270px] h-[410px] rounded-lg border drop-shadow-md bg-white z-20 md:h-[450px]">
                    <div class="flex h-[250px] bg-[url('/images/arrianne.png')] bg-top rounded-t-lg"></div>
                    <p class="mt-4 px-2 font-roboto font-bold text-xl leading-8 text-center text-[#4B4B4B] uppercase">
                        ARRIANNE R. UMALI
                    </p>
                    <p class="font-sans font-normal text-xs leading-5 text-center text-[#707070]">
                        BSCpE Intern, MSC
                    </p>
                    <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-6 ml-3 md:ml-6">
                        <img src="{{ asset('/images/location.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            Libas, Buenavista, Marinduque
                        </p>
                    </div>
                    <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6">
                        <img src="{{ asset('/images/phone.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            0998-748-2707
                        </p>
                    </div>
                    <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6 mb-5">
                        <img src="{{ asset('/images/email.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            umaliaryana@gmail.com
                        </p>
                    </div>
                </div>
                <img src="{{ asset('/images/accent-3.svg') }}" alt="" class="fixed bottom-0 -left-8 w-[520px]">
            </div>
        </section>
    </div>
    <footer id="footer">
        <div class="absolute relative bottom-0 flex h-fit w-full bg-[#425B71] items-center justify-center z-50 p-2">
            <p class="font-roboto font-normal text-xs leading-5 text-center text-white">
                BLTS is a project completed during the 2023 DILG Internship in collaboration with the 
                Computer Engineering on-the-job trainees from the Marinduque State College (MSC).
            </p>
        </div>
        <div class="flex flex-col absolute relative bottom-0 flex h-fit w-full bg-[#53697D] items-center justify-center z-50 p-2">
            <p class="flex font-roboto font-normal text-xs leading-5 text-center text-white">
                The DILG Marinduque Provincial Office assert full ownership rights over the 
                Barangay Legistative Tracking System (BLTS).
            </p>
            <p class="flex font-roboto font-normal text-xs leading-5 text-center text-white">
                The software was developed for the purpose of helping Barangay Secretaries managing 
                and organization barangay legistative documents.
            </p>
            <p class="flex font-roboto font-normal text-xs leading-5 text-center text-white">
                Any unauthorized use, reproduction, distribution, or modification of the sorftware
                without our explicit consent is strictly prohibited.
            </p>
            <p class="flex font-roboto font-normal text-xs leading-5 text-center text-white">
                We reserve the right to enforce our ownership rights and protect the integrity of the 
                software through legal means as neccessary.
            </p>
        </div>
    </footer>
    <script src="{{ asset('/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('/js/about.js') }}"></script>

@endsection