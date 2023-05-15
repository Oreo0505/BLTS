<div class="flex flex-col space-y-2 items-center py-4">
    <div class="flex-flex-col space-y-1 w-[65%] border-b drop-shadow-md shadow-lg p-4">
        <div class="flex flex-col justify-between items-center space-y-2 md:flex-row">
            <p class="font-sans font-medium text-base text-left">{{$document->type}} No.{{$document->number}}, s. {{date('Y', strtotime($document->date))}}</p>
            <img src="{{ asset('/images/approved.svg') }}" alt="" class="h-8 w-8">
        </div>
        <p class="text-base font-normal uppercase text-black/60">
            {{$document->title}}
        </p>
        <div class="flex flex-col">
            <p class="text-base font-bold text-black/60">
                Date of Enactment | {{date('M d, Y', strtotime($document->date))}}
            </p>
            <div class="flex flex-col items-end md:flex-row md:justify-between">
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
                </p>
                <div class="flex flex-row justify-end items-end space-x-4">
                    <a href={{'/download'.'/'.substr($document->file, 10)}} target="_blank" rel="noopener noreferrer" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                        <img src="{{ asset('/images/download.svg') }}" alt="">
                    </a>
                    <a href="/storage/{{$document->file}}" target="_blank" rel="noopener noreferrer" class="rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                        <img src="{{ asset('/images/open.svg') }}" alt="">
                    </a>
                    <a href="#" data-id="{{$document->id}}" class="update rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                        <img src="{{ asset('/images/sync.svg') }}" alt="">
                    </a>
                    <a href="#" data-id="{{$document->id}}" class="delete rounded-sm hover:bg-[#9ED6E7] hover:border hover:border-gray-100 hover:scale-150">
                        <img src="{{ asset('/images/delete.svg') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>