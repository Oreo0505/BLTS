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
                    Store your barangay legislative documents in <br> BLTS, the responsive online website
                </p>
                <p class="flex mt-16 font-sans font-normal text-white text-center leading-[21.6px]">
                    This aims to aide Barangay Officials in managing and keeping their records through an online website wherein the documents
                    <br>stored, such as Code of Ordinance, Ordinance, Resolution, Proposal, and others which are proposed and enacted by Barangays,
                    <br>are distinguished with which administrative term they were uploaded.
                </p>
                
                <a href="/admin_manual.pdf" target="_norefer" class="flex bg-white rounded-full mt-9 px-6 py-3 font-sans font-bold text-lg text-[#425B71] text-center">
                    View Documentation
                </a>
                <hr id="breakpoint">
                <a href="#authors" id="scroll-button" class="translate-y-8 h-fit w-fit flex items-center justify-center p-4 rounded-full bg-white shadow-md">
                    <img src="{{ asset('/images/arrow-head.svg') }}" id="arrow-head" alt="" class="h-5 w-5">
                </a>
            </div>
        </section>
        <div class="text-center mt-8 mb-2">
            <button id="toggleVersion" class="bg-white rounded-full px-6 py-3 font-sans font-bold text-lg text-[#425B71] text-center">
                Version 1
            </button>
        </div>
        <section id="authors" class ="section">
            <section id="authors_version_1" class="section">
                <div class=" text-center space-y-2 md:text-left mt-0">
                    <div class="flex flex-row justify-none space-x-8 px-5 pt-14 pb-10 w-screen overflow-x-scroll md:justify-center">
                        <div class="flex flex-col w-[270px] h-[410px] rounded-lg border drop-shadow-md bg-white z-20 md:h-[450px]">
                            <div class="flex h-[250px] bg-[url('/images/clarence.png')] bg-top bg-cover rounded-t-lg"></div>
                            <p class="mt-4 px-2 font-roboto font-bold text-xl leading-8 text-center text-[#4B4B4B] uppercase">
                                CLARENCE S. MADRIGAL
                            </p>
                            <p class="font-sans font-normal text-xs leading-5 text-center text-[#707070]">
                                SCpE Intern, MSC
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
                </div>
                <div class="flex flex-row justify-none space-x-8 px-5 pt-8 pb-10 w-screen overflow-x-scroll md:justify-center">
                    <p class="mt-4 px-2 font-roboto font-bold text-xl leading-8 text-center text-[#4B4B4B]">
                    Barangay Legislative Tracking System (BLTS) is an offline repository platform for archiving Barangay<br> Legislative Records.
                    Barangay Secretary uploads code of ordinances, ordinances, resolutions and  <br> others. BLTS is a project completed during the 2023 DILG Internship in  collaboration with the <br>
                    Computer Engineering on-the-job trainees from the Marinduque State College (MSC).
                    </p>
                </div>
                <img src="{{ asset('/images/accent-3.svg') }}" alt="" class="fixed bottom-0 -left-8 w-[520px]">
            </section>
            <section id="authors-version_2" class="section hidden ">
                <div class="flex flex-row justify-none space-x-8 px-5 pt-14 pb-10 w-screen overflow-x-scroll md:justify-center">
                    <div class="flex flex-col w-[270px] h-[410px] rounded-lg border drop-shadow-md bg-white z-20 md:h-[450px]">
                        <div class="flex h-[250px] bg-[url('/images/aubrey.png')] bg-top bg-cover rounded-t-lg"></div>
                        <p class="mt-4 px-2 font-roboto font-bold text-xl leading-8 text-center text-[#4B4B4B] uppercase">
                            AUBREY M. JABAL
                        </p>
                        <p class="font-sans font-normal text-xs leading-5 text-center text-[#707070]">
                            BSCpE Intern, MSC
                        </p>
                        <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-6 ml-3 md:ml-6">
                            <img src="{{ asset('/images/location.svg') }}" alt="" class="flex h-[13px]">
                            <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                                Ihatub, Boac, Marinduque
                            </p>
                        </div>
                        <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6">
                            <img src="{{ asset('/images/phone.svg') }}" alt="" class="flex h-[13px]">
                            <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                                0910-979-1138
                            </p>
                        </div>
                        <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6 mb-5">
                            <img src="{{ asset('/images/email.svg') }}" alt="" class="flex h-[13px]">
                            <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                                aubreyjabal12345@gmail.com
                            </p>
                        </div> 
                    </div>
                    <div class="flex flex-col w-[270px] h-[410px] rounded-lg border drop-shadow-md bg-white z-20 md:h-[450px]">
                        <div class="flex h-[250px] bg-[url('/images/rylene.png')] bg-top bg-cover rounded-t-lg"></div>
                        <p class="mt-4 px-2 font-roboto font-bold text-xl leading-8 text-center text-[#4B4B4B] uppercase">
                        RYLENE GRACE L. SACRO
                        </p>
                        <p class="font-sans font-normal text-xs leading-5 text-center text-[#707070]">
                            BSCpE Intern, MSC
                        </p>
                        <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-6 ml-3 md:ml-6">
                            <img src="{{ asset('/images/location.svg') }}" alt="" class="flex h-[13px]">
                            <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                                Ihatub, Boac, Marinduque
                            </p>
                        </div>
                        <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6">
                            <img src="{{ asset('/images/phone.svg') }}" alt="" class="flex h-[13px]">
                            <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                                0977-733-9380
                            </p>
                        </div>
                        <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6 mb-5">
                            <img src="{{ asset('/images/email.svg') }}" alt="" class="flex h-[13px]">
                            <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                                rylenesacro@gmail.com
                            </p>
                        </div> 
                    </div>
                    <div class="flex flex-col w-[270px] h-[410px] rounded-lg border drop-shadow-md bg-white z-20 md:h-[450px]">
                        <div class="flex h-[250px] bg-[url('/images/tin.png')] bg-top bg-cover rounded-t-lg"></div>
                        <p class="mt-4 px-2 font-roboto font-bold text-lg leading-8 text-center text-[#4B4B4B] uppercase">
                        MA. CHRISTINE JOY S. FRANK
                        </p>
                        <p class="font-sans font-normal text-xs leading-5 text-center text-[#707070]">
                            BSCpE Intern, MSC
                        </p>
                        <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-6 ml-3 md:ml-6">
                            <img src="{{ asset('/images/location.svg') }}" alt="" class="flex h-[13px]">
                            <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            Bacongbacong, Gasan, Marinduque
                            </p>
                        </div>
                        <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6">
                            <img src="{{ asset('/images/phone.svg') }}" alt="" class="flex h-[13px]">
                            <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            0927-740-7949
                            </p>
                        </div>
                        <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6 mb-5">
                            <img src="{{ asset('/images/email.svg') }}" alt="" class="flex h-[13px]">
                            <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            christinefrank03@gmail.com
                            </p>
                        </div> 
                    </div>
                </div>

                <div class="flex flex-row justify-none space-x-8 px-5 pt-14 pb-10 w-screen overflow-x-scroll md:justify-center">
                    <div class="flex flex-col w-[270px] h-[410px] rounded-lg border drop-shadow-md bg-white z-20 md:h-[450px]">
                        <div class="flex h-[250px] bg-[url('/images/adrian.png')] bg-top bg-cover rounded-t-lg"></div>
                        <p class="mt-4 px-2 font-roboto font-bold text-xl leading-8 text-center text-[#4B4B4B] uppercase">
                            ADRIAN O. VILLARUEL
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
                                0977-739-0963
                            </p>
                        </div>
                        <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6 mb-5">
                            <img src="{{ asset('/images/email.svg') }}" alt="" class="flex h-[13px]">
                            <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            adrianvillaruel17@gmail.com
                        
                            </p>
                        </div> 
                    </div>
                    <div class="flex flex-col w-[270px] h-[410px] rounded-lg border drop-shadow-md bg-white z-20 md:h-[450px]">
                        <div class="flex h-[250px] bg-[url('/images/trixia.png')] bg-top bg-cover rounded-t-lg"></div>
                        <p class="mt-4 px-2 font-roboto font-bold text-xl leading-8 text-center text-[#4B4B4B] uppercase">
                            TRIXIA G. HISTORILLO
                        </p>
                        <p class="font-sans font-normal text-xs leading-5 text-center text-[#707070]">
                            BSCpE Intern, MSC
                        </p>
                        <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-6 ml-3 md:ml-6">
                            <img src="{{ asset('/images/location.svg') }}" alt="" class="flex h-[13px]">
                            <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                                Caganhao, Boac, Marinduque
                            </p>
                        </div>
                        <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6">
                            <img src="{{ asset('/images/phone.svg') }}" alt="" class="flex h-[13px]">
                            <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            0999-475-0019
                            </p>
                        </div>
                        <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6 mb-5">
                            <img src="{{ asset('/images/email.svg') }}" alt="" class="flex h-[13px]">
                            <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            trixiahistorillo3@gmail.com 
                            </p>
                        </div> 
                    </div>
                    <div class="flex flex-col w-[270px] h-[410px] rounded-lg border drop-shadow-md bg-white z-20 md:h-[450px]">
                        <div class="flex h-[250px] bg-[url('/images/vea.png')] bg-top rounded-t-lg"></div>
                        <p class="mt-4 px-2 font-roboto font-bold text-xl leading-8 text-center text-[#4B4B4B] uppercase">
                            REENA VEA MENDOZA
                        </p>
                        <p class="font-sans font-normal text-xs leading-5 text-center text-[#707070]">
                            BSCpE Intern, MSC
                        </p>
                        <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-6 ml-3 md:ml-6">
                            <img src="{{ asset('/images/location.svg') }}" alt="" class="flex h-[13px]">
                            <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                                Argao, Mogpog, Marinduque
                            </p>
                        </div>
                        <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6">
                            <img src="{{ asset('/images/phone.svg') }}" alt="" class="flex h-[13px]">
                            <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            0966-378-4023
                            </p>
                        </div>
                        <div class="flex flex-row items-center justify-start space-x-1 pr-1 mt-1.5 ml-3 md:ml-6 mb-5">
                            <img src="{{ asset('/images/email.svg') }}" alt="" class="flex h-[13px]">
                            <p class="flex font-sans font-normal text-xs leading-5 text-[#707070] truncate">
                            reenaveamendoza02@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-none space-x-8 px-5 pt-14 pb-10 w-screen overflow-x-scroll md:justify-center">
                    <p class="mt-4 px-2 font-roboto font-bold text-xl leading-8 text-center text-[#4B4B4B]">
                    The Barangay Legislative Tracking System (BLTS) functions as a comprehensive online repository platform <br> designed to efficiently archive and manage Barangay Legislative Records.
                    This BLTS system version 2 is <br>  an improvement where converted from offline to online platform  for  efficient access and online <br>  archiving of legislative documents, such as codes of ordinances, ordinances, resolutions, <br>  and other related records, are securely stored and organized. 
                    </p> 
                </div>
                <img src="{{ asset('/images/accent-3.svg') }}" alt="" class="fixed bottom-0 -left-8 w-[520px]">
            </section>
        </section>
    </div>
    <footer id="footer">
        <div class="flex flex-col absolute relative bottom-0 flex h-fit w-full bg-[#53697D] items-center justify-center z-50 p-2">
            <div class="flex flex-row items-center justify-start space-x-4 pr-1 mt-0 ml-3 md:ml-0">
                <img src="{{ asset('/images/dilg_logo.svg') }}" alt="" class="flex h-12">
                <img src="{{ asset('/images/lgrc_logo.svg') }}" alt="" class="flex h-`12">
                <img src="{{ asset('/images/one_duque.png') }}" alt="" class="flex h-12">
            </div>
            <p class="flex font-roboto font-normal text-xs leading-5 text-center text-white">
                Spearheaded by DILG Provincial Office through its administration center office.
            </p>
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
    <script src="{{ asset('/js/about_version2.js') }}"></script>


@endsection