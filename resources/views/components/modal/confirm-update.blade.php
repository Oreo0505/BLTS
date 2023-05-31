<div id="confirm-profile-update-overlay" class="hidden fixed w-full h-100 inset-0 z-10 overflow-hidden flex justify-center items-center brightness-50 backdrop-blur-sm animated faster">
</div>
<div id="confirm-profile-update" class="hidden fixed inset-0 h-fit  h-fit w-2/3 flex flex-col border drop-shadow-md shadow-lg modal-container bg-white mx-auto my-auto rounded z-50 overflow-y-auto animated faster md:w-1/3">
    <div class="flex px-6 py-4">
        <p class="font-sans font-medium text-xl text-black/90">Do you want to update the current BLTS administration profile?</p>
    </div>
    <div class="flex px-6 py-2">
        <p class="font-sans font-normal text-base text-black/80">Updating this will be reflected on all documents with authors of updated info.</p>
    </div>
    <div class="flex flex-row space-x-2 justify-end p-2">
        <button id="update-false" class="px-2 py-1.5 font-sans font-medium text-sm text-[#1976D2] hover:text-gray-400">NO</button>
        <button id="update-true" class="px-2 py-1.5 font-sans font-medium text-sm text-[#1976D2] hover:text-red-400">UPDATE</button>
    </div>
</div>

