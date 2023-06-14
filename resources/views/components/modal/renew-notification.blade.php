<div id="renew-overlay" class="fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center brightness-50 backdrop-blur-sm animated faster">
</div>
<div id="renew" class="fixed inset-0 h-fit w-2/3 flex flex-col border drop-shadow-md shadow-lg modal-container bg-white mx-auto my-auto rounded z-50 overflow-y-auto animated faster fadeIn md:w-2/5">
    <div class="flex flex-col px-6 py-4">
        <p class="font-sans font-medium text-xl text-black/90">Administrative term has ended.</p>
        <p class="font-sans font-medium text-xl text-black/90">Please renew / update your barangay profile.</p>
    </div>
    <div class="flex px-6 py-2">
        <p class="font-sans font-normal text-base text-black/80">
            You can skip this, however, you cannot upload any documents enacted after
            <span class="font-medium">{{ date('M d, Y',strtotime($term->end)) }}</span>.
        </p>
    </div>
    <div class="flex flex-row space-x-2 justify-end p-2">
        <button id="renew-false" class="px-2 py-1.5 font-sans font-medium text-sm text-[#1976D2] hover:text-gray-400">LATER</button>
        <a href="/renew" id="renew-true" class="px-2 py-1.5 font-sans font-medium text-sm text-[#1976D2] hover:text-red-400">RENEW</a>
    </div>
</div>

<script src="{{ asset('/js/renew_notification.js') }}"></script>