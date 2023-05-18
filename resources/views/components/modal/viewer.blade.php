<div id="viewer" class="hidden fixed right-0 bottom-0 h-full w-full flex flex-col items-center border drop-shadow-md shadow-lg modal-container bg-white rounded z-10 animated faster pt-12">
    <button id="close-viewer" title="Upload" class="fixed z-10 top-24 left-24 bg-[#425B71] w-[72px] h-[72px] overflow-clip rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-[#346A90] hover:drop-shadow-2xl">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-black fill-gray-700 h-9 w-9">
            <path d="M19 19V15C19 14.1667 18.7083 13.4583 18.125 12.875C17.5417 12.2917 16.8333 12 16 12H6.8L10.4 15.6L9 17L3 11L9 5L10.4 6.4L6.8 10H16C17.3833 10 18.5625 10.4875 19.5375 11.4625C20.5125 12.4375 21 13.6167 21 15V19H19Z"/>
        </svg>
    </button>
    <iframe id="viewer-frame" src ="" class="h-full w-full"></iframe>
</div>

<script src="{{ asset('/js/viewer.js') }}"></script>
