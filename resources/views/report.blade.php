<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
    {{-- @vite('resources/css/app.css') --}}
    <title>Report</title>
</head>
<body>
    <header class="w-full h-28 border-b-2" style="border-color: black">
        <img src="{{ asset('/images/default_logo.png') }}" class="absolute top-4 left-8 h-20">
        <p class="absolute top-9 left-28 ml-4 my-auto font-sans font-bold text-[12px] uppercase text-left align-middle">
            SANGGUNIANG BARANGAY NG BANGBANGALON
        </p>
        <p class="absolute top-14 left-28 ml-4 my-auto font-sans font-normal text-10px text-left align-middle">
            Boac, Marinduque
        </p>
        <p class="absolute right-8 font-sans font-xs text-xs italic align-top">Date Generated: {{date('m/d/Y')}}</p>
        <hr class="absolute top-16"/>
    </header>

    <p class="mt-6 font-sans font-bold text-[12px] text-center uppercase">
        BARANGAY LEGISLATIVE TRACKING SYSTEM (BLTS)
    </p>
    <p class="font-sans font-bold text-[12px] text-center uppercase">
        REPORT NO. {{$year}}-{{sprintf("%02d", $number)}}
    </p>
    <p class="mt-16 mb-2 font-sans font-bold text-sm">Filters Applied</p>
    <div class="w-full">
        <div class="float-left w-1/4">
            <p class="font-sans font-normal text-sm">
                Author/s
            </p>
        </div>    
        <div class="float-left w-3/4 ml-32 pr-12">
            <p class="font-sans font-normal text-sm italic">
                {{ucwords($authors)}}
            </p>
        </div>
        <br>
    </div>
    <div class="w-full">
        <p class="inline font-sans font-normal text-sm">
            Administrative Year
        </p>    
        <p class="inline font-sans font-normal text-sm ml-11 italic">
            {{ucwords($administration)}}
        </p>
    </div>
    <div class="w-full">
        <p class="inline font-sans font-normal text-sm">
            Type of Document/s
        </p>    
        <p class="inline font-sans font-normal text-sm ml-10 italic">
            {{ucwords($type)}}
        </p>
    </div>
    <div class="w-full">
        <p class="inline font-sans font-normal text-sm">
            Governance Area
        </p>    
        <p class="inline font-sans font-normal text-sm ml-14 italic">
            {{ucwords($area)}}
        </p>
    </div>
    <div class="table w-full mt-10">
        <div class="table-header-group">
            <div class="table-row border">
                <div class="table-cell text-center font-bold align-middle text-sm" style="width: 5%; background-color: #D9D9D9">No.</div>
                <div class="table-cell text-center font-bold align-middle text-sm" style="width: 17%; background-color: #D9D9D9">Document</div>
                <div class="table-cell text-center font-bold align-middle text-sm" style="width: 25%; background-color: #D9D9D9">Title</div>
                <div class="table-cell text-center font-bold align-middle text-sm" style="width: 18%; background-color: #D9D9D9">Author/s</div>
                <div class="table-cell text-center font-bold align-middle text-sm" style="width: 15%; background-color: #D9D9D9">Date of Enactment / Adaption</div>
                <div class="table-cell text-center font-bold align-middle text-sm" style="width: 20%; background-color: #D9D9D9">Governance Area</div>
            </div>
        </div>

        @php
            $i = 1;
        @endphp
        @foreach($documents as $document)
            <div class="table-row-group border-b" style="border-color: black;">
                <div class="table-row">
                    <div class="table-cell font-sans font-bold text-center align-middle text-sm">{{$i}}</div>
                    <div class="table-cell font-sans font-bold text-center align-middle text-sm">{{$document->type}} No. {{$document->number}}, s.{{date('Y', strtotime($document->date))}}</div>
                    <div class="table-cell font-sans text-center align-middle text-sm">
                        {{$document->title}}
                    </div>
                    <div class="table-cell text-center align-middle text-sm">

                        @php
                            $authors = [];
                        @endphp
                        @foreach($document->authors as $author)
                            @php
                                array_push($authors, $author->name);
                            @endphp
                        @endforeach
                        {{join(", ", $authors)}}
                        @php
                            if(count($authors) <= 0){
                                echo "No author";
                            }
                        @endphp

                    </div>
                    <div class="table-cell font-sans text-center align-middle text-sm">{{date('M d, Y',strtotime($document->date))}}</div>
                    <div class="table-cell font-sans text-center align-middle text-sm">{{$document->area}}</div>
                </div>
            </div>

            @php
                $i++;
            @endphp
        @endforeach
    </div>
</body>
</html>