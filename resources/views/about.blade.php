<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>About</title>
    <style>
        html{
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
    <div id="container" class="container">
        <section id="info" class="section">
            <div class="h-[440px] w-full flex flex-col items-center bg-[#425B71] px-[115px] pt-[88px] pb-28">
                <img src="{{ asset('/images/accent-3.svg') }}" alt="" class="absolute top-0 right-0 w-[520px] rotate-180">
                <img id="test" src="{{ asset('/images/logo-white.svg') }}" alt="BLTS Logo" class="flex h-32">
                <p class="flex font-sans font-bold text-white text-center text-base leading-5 italic">
                    Store your barangay legislative documents in <br> BLTS, the responsive offline website
                </p>
                <p class="flex mt-16 font-sans font-normal text-white text-center leading-[21.6px]">
                    This aims to aide Barangay Officials in managing and keeping their records through an offline website wherein the documents
                    <br>stored, such as Code of Ordinance, Ordinance, Resolution, Proposal, and others which are proposed and enacted by Barangays,
                    <br>are distinguished with which administrative term they were uploaded.
                </p>
                <a href="#authors" id="scroll-button" class="absolute relative top-[72px] h-fit w-fit flex items-center justify-center p-4 rounded-full bg-white shadow-md">
                    <img src="{{ asset('/images/arrow-head.svg') }}" id="arrow-head" alt="" class="h-5 w-5">
                </a>
                <img src="{{ asset('/images/accent-3.svg') }}" alt="" class="absolute -bottom-8 left-0 w-[520px]">
                <hr id="breakpoint" class="bg-white -translate-y-4">
            </div>
        </section>
        <section id="authors" class="section">
            <div class="h-[40px] w-full bg-[#425B71]">
            </div>
            <div class="flex flex-row justify-center items-start space-x-8 h-[505px] mt-28">
                <div class="flex flex-col rounded-lg border justify-center drop-shadow-md overflow-clip">
                    <img src="{{ asset('/images/clarence.png') }}" alt="" class="h-[264px] w-[300px]">
                    <p class="mt-4 font-sans font-bold text-xl leading-8 text-center text-[#4B4B4B] uppercase">
                        CLARENCE S. MADRIGAL
                    </p>
                    <p class="font-sans font-normal text-xs leading-5 text-center text-[#707070]">
                        BSCpE Intern, MSC
                    </p>
                    <div class="flex flex-row items-center justify-start space-x-1 mt-6 ml-12">
                        <img src="{{ asset('/images/location.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070]">
                            Dili, Gasan, Marinduque
                        </p>
                    </div>
                    <div class="flex flex-row items-center justify-start space-x-1 mt-1.5 ml-12">
                        <img src="{{ asset('/images/phone.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070]">
                            0918-399-3030
                        </p>
                    </div>
                    <div class="flex flex-row items-center justify-start space-x-1 mt-1.5 ml-12 mb-5">
                        <img src="{{ asset('/images/email.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070]">
                            clarencemadrigal08@gmail.com
                        </p>
                    </div> 
                </div>
                <div class="flex flex-col rounded-lg border justify-center drop-shadow-md overflow-clip">
                    <img src="{{ asset('/images/jepthe.png') }}" alt="" class="h-[264px] w-[300px]">
                    <p class="mt-4 font-sans font-bold text-xl leading-8 text-center text-[#4B4B4B] uppercase">
                        JEPTHE M. LADERAS
                    </p>
                    <p class="font-sans font-normal text-xs leading-5 text-center text-[#707070]">
                        BSCpE Intern, MSC
                    </p>
                    <div class="flex flex-row items-center justify-start space-x-1 mt-6 ml-12">
                        <img src="{{ asset('/images/location.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070]">
                            Tanza, Boac, Marinduque
                        </p>
                    </div>
                    <div class="flex flex-row items-center justify-start space-x-1 mt-1.5 ml-12">
                        <img src="{{ asset('/images/phone.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070]">
                            0916-418-2098
                        </p>
                    </div>
                    <div class="flex flex-row items-center justify-start space-x-1 mt-1.5 ml-12 mb-5">
                        <img src="{{ asset('/images/email.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070]">
                            jeptheladeras@gmail.com
                        </p>
                    </div> 
                </div>
                <div class="flex flex-col rounded-lg border justify-center drop-shadow-md overflow-clip">
                    <img src="{{ asset('/images/arrianne.png') }}" alt="" class="h-[264px] w-[300px]">
                    <p class="mt-4 font-sans font-bold text-xl leading-8 text-center text-[#4B4B4B] uppercase">
                        ARRIANNE S. UMALI
                    </p>
                    <p class="font-sans font-normal text-xs leading-5 text-center text-[#707070]">
                        BSCpE Intern, MSC
                    </p>
                    <div class="flex flex-row items-center justify-start space-x-1 mt-6 ml-12">
                        <img src="{{ asset('/images/location.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070]">
                            Libas, Buenavista, Marinduque
                        </p>
                    </div>
                    <div class="flex flex-row items-center justify-start space-x-1 mt-1.5 ml-12">
                        <img src="{{ asset('/images/phone.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070]">
                            0998-748-2707
                        </p>
                    </div>
                    <div class="flex flex-row items-center justify-start space-x-1 mt-1.5 ml-12 mb-5">
                        <img src="{{ asset('/images/email.svg') }}" alt="" class="flex h-[13px]">
                        <p class="flex font-sans font-normal text-xs leading-5 text-[#707070]">
                            umaliaryana@gmail.com
                        </p>
                    </div> 
                </div>
            </div>
        </section>
    </div>
    <script src="{{ asset('/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('/js/about.js') }}"></script>
</body>
</html>