<div class="flex-flex-col w-full border-x border-b drop-shadow-sm shadow-sm">
    <div class="flex flex-row justify-between items-center px-4 pt-2 pb-1 bg-[#F5F5F5]">
        <p class="font-sans font-medium text-base text-left">{{$document->type}} No.{{$document->number}}, s. {{date('Y', strtotime($document->date))}}</p>
        
        @if($document->area == 'Financial Administration and Sustainability')
            <a href="/browse?by=area&value=Financial Administration and Sustainability" class="">
                <img src="{{ asset('/images/Financial_Administration_and_Sustainability.svg') }}" alt="Financial Administration and Sustainability" title="Financial Administration and Sustainability" class="h-8 w-8">            
            </a>
        @elseif($document->area == 'Disaster Preparedness')
            <a href="/browse?by=area&value=Disaster Preparedness" class="">
                <img src="{{ asset('/images/Disaster_Preparedness.svg') }}" alt="Disaster Preparedness" title="Disaster Preparedness" class="h-8 w-8">
            </a>
        @elseif($document->area == 'Safety, Peace and Order')
            <a href="/browse?by=area&value=Safety, Peace and Order" class="">
                <img src="{{ asset('/images/Safety_Peace_and_Order.svg') }}" alt="Safety Peace and Order" title="Safety Peace and Order" class="h-8 w-8">
            </a>
        @elseif($document->area == 'Social Protection and Sensitivity')
            <a href="/browse?by=area&value=Social Protection and Sensitivity" class="">
                <img src="{{ asset('/images/Social_Protection_and_Sensitivity.svg') }}" alt="Social Protection and Sensitivity" title="Social Protection and Sensitivity" class="h-8 w-8">
            </a>
        @elseif($document->area == 'Business-Friendliness and Competitiveness')
            <a href="/browse?by=area&value=Business-Friendliness and Competitiveness" class="">
                <img src="{{ asset('/images/Business_Friendliness_and_Competitiveness.svg') }}" alt="Business Friendliness and Competitiveness" title="Business Friendliness and Competitiveness" class="h-8 w-8">
            </a>
        @elseif($document->area == 'Environmental Management')
            <a href="/browse?by=area&value=Environmental Mannagement" class="">
                <img src="{{ asset('/images/Environmental_Management.svg') }}" alt="Environmental Management" title="Environmental Management" class="h-8 w-8">                
            </a>
        @endif

    </div>
    <p class="text-base font-normal uppercase text-black/60 px-4 pt-2 bg-white">
        {{$document->title}}
    </p>
    <div class="flex flex-col px-4 pb-2 bg-white">
        <p class="text-base font-bold text-black/60 pt-2">
            Date of Enactment | {{date('M d, Y', strtotime($document->date))}}
        </p>
        <div class="flex flex-row justify-between md:flex-row md:justify-between">
            <div class="flex w-3/5 items-start">
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
            </div>
            <div class="flex flex-row w-2/5 justify-end items-end space-x-4">
                <a href={{'/download'.'/'.substr($document->file, 10)}} target="_blank" rel="noopener noreferrer" class="rounded-sm hover:bg-[#F5F5F5] hover:scale-150">
                    <img src="{{ asset('/images/download.svg') }}" alt="Download" title="Download">
                </a>
                <button type="button" data-file="{{ $document->file}}" class="view rounded-sm hover:bg-[#F5F5F5] hover:scale-150">
                    <img src="{{ asset('/images/view.svg') }}" alt="Open" title="Open" class="-translate-y-1">
                </button>
                <button type="button" data-id="{{$document->id}}" class="update rounded-sm hover:bg-[#F5F5F5] hover:scale-150">
                    <img src="{{ asset('/images/update.svg') }}" alt="Update" title="Update">
                </a>
                @if($document->isinCurrentTerm())
                    <button type="button" data-id="{{$document->id}}" class="delete rounded-sm hover:bg-[#F5F5F5] hover:scale-150">
                        <img src="{{ asset('/images/delete.svg') }}" alt="Delete" title="Delete">
                    </button>
                @else
                    <button type="button" class="rounded-sm bg-gray-400/50">
                        <img src="{{ asset('/images/delete.svg') }}" alt="Delete Disabled" title="Delete Disabled">
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>