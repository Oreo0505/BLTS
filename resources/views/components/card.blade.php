<div class="flex-flex-col w-full border-x border-b drop-shadow-sm shadow-sm">
    <div class="flex flex-row justify-between items-center px-4 pt-2 pb-1 bg-[#F5F5F5]">
        <p class="font-sans font-medium text-base text-left">{{$document->type}} No.{{$document->number}}, s. {{date('Y', strtotime($document->date))}}</p>
        
        @if($document->area == 'Financial Administration and Sustainability')
            <img src="{{ asset('/images/Financial_Administration_and_Sustainability.svg') }}" alt="" class="h-8 w-8">
        @elseif($document->area == 'Disaster Preparedness')
            <img src="{{ asset('/images/Disaster_Preparedness.svg') }}" alt="" class="h-8 w-8">
        @elseif($document->area == 'Safety, Peace and Order')
            <img src="{{ asset('/images/Safety_Peace_and_Order.svg') }}" alt="" class="h-8 w-8">
        @elseif($document->area == 'Social Protection and Sensitivity')
            <img src="{{ asset('/images/Social_Protection_and_Sensitivity.svg') }}" alt="" class="h-8 w-8">
        @elseif($document->area == 'Business-Friendliness and Competitiveness')
            <img src="{{ asset('/images/Business_Friendliness_and_Competitiveness.svg') }}" alt="" class="h-8 w-8">
        @elseif($document->area == 'Environmental Management')
            <img src="{{ asset('/images/Environmental_Management.svg') }}" alt="" class="h-8 w-8">
        @endif

    </div>
    <p class="text-base font-normal uppercase text-black/60 px-4 pt-2 bg-white">
        {{$document->title}}
    </p>
    <div class="flex flex-col px-4 pb-2 bg-white">
        <p class="text-base font-bold text-black/60 pt-2">
            Date of Enactment | {{date('M d, Y', strtotime($document->date))}}
        </p>
        <div class="flex flex-col justify-start items-end md:flex-row md:justify-between">
            <p class="text-base font-bold text-black/60">
                Author/s | 
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
            </p>
            <div class="flex flex-row justify-end items-end space-x-4">
                <a href={{'/download'.'/'.substr($document->file, 10)}} target="_blank" rel="noopener noreferrer" class="rounded-sm hover:bg-[#F5F5F5] hover:scale-150">
                    <img src="{{ asset('/images/download.svg') }}" alt="Download" title="Download">
                </a>
                <button type="button" data-file="{{ $document->file}}" class="view rounded-sm hover:bg-[#F5F5F5] hover:scale-150">
                    <img src="{{ asset('/images/view.svg') }}" alt="Open" title="Open" class="-translate-y-1">
                </button>
                <button type="button" data-id="{{$document->id}}" class="update rounded-sm hover:bg-[#F5F5F5] hover:scale-150">
                    <img src="{{ asset('/images/update.svg') }}" alt="Update" title="Update">
                </a>
                <button type="button" data-id="{{$document->id}}" class="delete rounded-sm hover:bg-[#F5F5F5] hover:scale-150">
                    <img src="{{ asset('/images/delete.svg') }}" alt="Delete" title="Delete">
                </button>
            </div>
        </div>
    </div>
</div>